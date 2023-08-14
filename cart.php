<?php 


//new cart class
class Cart {
    private $cartData = [];

    public function __construct() {
        $this->loadCartFromCookie();
    }

    private function loadCartFromCookie() {
        if (isset($_COOKIE['cart'])) {
            $this->cartData = json_decode($_COOKIE['cart'], true);
        }
    }

    private function saveCartToCookie() {
        setcookie('cart', json_encode($this->cartData), time() + (86400 * 30), '/'); // Cookie lasts for 30 days
    }

    public function addProduct($productId, $productName, $price, $quantity) {
        if (isset($this->cartData[$productId])) {
            $this->cartData[$productId]['quantity'] += $quantity;
        } else {
            $this->cartData[$productId] = [
                'id' => $productId,
                'name' => $productName,
                'price' => $price,
                'quantity' => $quantity
            ];
        }
        
        $this->saveCartToCookie();
    }

    public function changeQuantity($productId, $quantity) {
        if (isset($this->cartData[$productId])) {
            $this->cartData[$productId]['quantity'] = $quantity;
            $this->saveCartToCookie();
        }
    }

    public function clearCart() {
        $this->cartData = [];
        $this->saveCartToCookie();
    }

    public function getCart() {
        return $this->cartData;
    }
}

