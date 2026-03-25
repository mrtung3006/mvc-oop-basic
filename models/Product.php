<?php

class Product
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB(); // Hàm này bạn đã định nghĩa trong function.php
    }

    public function getTop5Latest()
    {
        try {
            $sql = "SELECT * FROM products ORDER BY id DESC LIMIT 5";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
}
?>