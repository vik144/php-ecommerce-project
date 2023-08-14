<?php 
require('connect.php');

if (isset($_GET['order_id'])) {
  $order_id = intval($_GET['order_id']);
 echo("order id is: " . $order_id);
}

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
$stmt = $conn->prepare("SELECT
                          o.id AS order_id,
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

// Separate customer details from the first row
$customerDetails = array(
    'first_name' => $rows[0]['first_name'],
    'last_name' => $rows[0]['last_name'],
    'email' => $rows[0]['email'],
    'street' => $rows[0]['street'],
    'province' => $rows[0]['province'],
    'city' => $rows[0]['city'],
    'zipcode' => $rows[0]['zipcode'],
);
?>

<html>
<head>
    <title>Order Details</title>
</head>
<body>
    <h2>Customer Details:</h2>
    <p>Name: <?php echo $customerDetails['first_name'] . " " . $customerDetails['last_name']; ?></p>
    <p>Email: <?php echo $customerDetails['email']; ?></p>
    <p>Address: <?php echo $customerDetails['street'] . ", " . $customerDetails['province'] . ", " . $customerDetails['city'] . ", " . $customerDetails['zipcode']; ?></p>

    <h2>Order Details:</h2>
    <table >
        <tr>
            <th>Order ID</th>
            <th>Product ID</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Product Name</th>
        </tr>
        <?php
        // Output the order details for all rows
        foreach ($rows as $row) {
            echo "<tr>
                    <td>" . $row['order_id'] . "</td>
                    <td>" . $row['product_id'] . "</td>
                    <td>" . $row['product_qty'] . "</td>
                    <td>" . $row['price'] . "</td>
                    <td>" . $row['product_name'] . "</td>
                </tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
$stmt->close();
$conn->close();
?>



