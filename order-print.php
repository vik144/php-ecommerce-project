<?php
    include 'connect.php';
if (isset($_GET['order_id'])) {
    $order_id = intval($_GET['order_id']);
//    echo("order id is: " . $order_id);
  }
   
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
//including the connecting databse file
require('fpdf185/fpdf.php');
date_default_timezone_set('UTC');
class PDF extends FPDF
{
    
    // Page header
function Header()
{
    // Logo
    $this->Image('logo/icon.png',88,0,30);
    // Arial bold 15
    $this->Ln(20);
    $this->SetFont('Arial','B',16);
    // Move to the right
    $this->Cell(70);
    $this->Cell(40,20,'Classic Watches',0,'C');
    // Title
    // Line break
    $this->Ln(10);
}
}
  //qyery stored in in an varibale
  
 
  // Prepare and bind
  $stmt = $conn->prepare("SELECT
                            o.id AS order_id,
                            o.order_total,
                            od.product_id,
                            od.product_qty,
                            od.price,
                            od.product_name,
                            c.first_name,
                            c.last_name,
                            c.email,
                            c.street,
                            c.province,
                            c.city,
                            c.zipcode
                        FROM orders o
                        JOIN order_details od ON o.id = od.order_id
                        JOIN customers_details c ON o.customer_id = c.srno
                        WHERE o.id = ?");
  $stmt->bind_param("i", $order_id);
  
  // run the query
  $stmt->execute();
  
  // Get result
  $result = $stmt->get_result();
  
  $rows = $result->fetch_all(MYSQLI_ASSOC);
  $customerDetails = array(
    'first_name' => $rows[0]['first_name'],
    'last_name' => $rows[0]['last_name'],
    'email' => $rows[0]['email'],
    'street' => $rows[0]['street'],
    'province' => $rows[0]['province'],
    'city' => $rows[0]['city'],
    'zipcode' => $rows[0]['zipcode'],
);
            
            $pdf = new PDF();
            $pdf->AliasNbPages();
            $pdf->AddPage();
            $pdf->SetFont('arial','',12);
            $pdf->SetFont('Arial', 'B', 16);
            $pdf->Cell(0, 10, 'Customer Details', 0, 1, 'C');
            $pdf->Ln();
            $pdf->SetFont('Arial', '', 13);
            $pdf->Cell(0, 10, 'Name: ' . $customerDetails['first_name'] . ' ' . $customerDetails['last_name'], 0, 1);
            $pdf->Cell(0, 10, 'Email: ' . $customerDetails['email'], 0, 1);
            $pdf->Cell(0, 10, 'Address: ' . $customerDetails['street'] . ', ' . $customerDetails['province'] . ', ' . $customerDetails['city'] . ', ' . $customerDetails['zipcode'], 0, 1);
            
            // Add order details table
            $pdf->Ln();
            $pdf->SetFont('Arial', 'B', 16);
            $pdf->Cell(0, 10, 'Order Details', 0, 1, 'C');
            $pdf->Ln();

            $pdf->SetFont('Arial', 'B', 12);
            $pdf->Cell(70, 10, 'Product Name', 1);
            $pdf->Cell(30, 10, 'Quantity', 1);
            $pdf->Cell(30, 10, 'Price', 1);
            $pdf->Ln();

            $pdf->SetFont('Arial', '', 12);
            foreach ($rows as $row) {
                $pdf->Cell(70, 10, $row['product_name'], 1);
                $pdf->Cell(30, 10, $row['product_qty'], 1);
                $pdf->Cell(30, 10, $row['price'], 1);
                $pdf->Ln();
            }
            $pdf->Cell(500,15,"Total: ".$row['order_total'],"",1,"");

            $pdf->Output();
?>