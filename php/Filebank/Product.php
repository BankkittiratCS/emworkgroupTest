<?php
require_once("RegisterAndloginsystem.php");
class Product
{
    public $ProductID;
    public $ProductName;
    public $ProductPrice;
    public $ProductInfo;

    function __construct()
    {
       
    }
    function ShowProduct()
    {
        $conn = new DB_con();
        $connection = $conn->getConnection();

        // สร้างคำสั่ง SQL เพื่อดึงข้อมูลสินค้า
        $sql = "SELECT ProductID, ProductName, ProductPrice, ProductInfo FROM Product";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            echo '<div class="container mt-5">';
            echo '<h2 class="text-center mb-4">สินค้าในระบบ</h2>';
            echo '<div class="row">';
        
            // loop ผ่านข้อมูลสินค้าและแสดงผล
            while ($row = $result->fetch_assoc()) {
                echo '<div class="col-md-4 mb-4">';
                echo '<div class="card">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . htmlspecialchars($row['ProductName']) . '</h5>';
                echo '<p class="card-text">ราคา: ' . htmlspecialchars($row['ProductPrice']) . ' บาท</p>';
                echo '<p class="card-text">' . htmlspecialchars($row['ProductInfo']) . '</p>';
                echo '<p class="card-text">Product ID: ' . htmlspecialchars($row['ProductID']) . '</p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        
            echo '</div>'; // ปิด row
            echo '</div>'; // ปิด container
        } else {
            echo "ไม่มีสินค้าในระบบ";
        }
        
        // ปิดการเชื่อมต่อ
        $connection->close();
    }
}
