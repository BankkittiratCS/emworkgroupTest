<?php
// กำหนดค่าการเชื่อมต่อฐานข้อมูล
define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'MYSQL_ROOT_PASSWORD'); // รหัสผ่านของ MySQL
define('DB_NAME', 'MYSQL_DATABASE'); // ชื่อฐานข้อมูล

class DB_con
{
    public $dbcon;

    function __construct()
    {
        // ใช้ positional arguments ใน mysqli_connect
        $this->dbcon = mysqli_connect('db', DB_USER, DB_PASS, DB_NAME);


        if (mysqli_connect_errno()) {
            die("ไม่สามารถเชื่อมต่อฐานข้อมูล: " . mysqli_connect_error());
        } else {
            //echo "เชื่อมต่อฐานข้อมูลสำเร็จ";
        }
    }

    // ฟังก์ชันเพื่อปิดการเชื่อมต่อ
    function close()
    {
        if ($this->dbcon) {
            mysqli_close($this->dbcon);
           
        }
    }

    // ฟังก์ชันเพื่อดึงการเชื่อมต่อ
    function getConnection()
    {
        return $this->dbcon;
    }
    
    
   
}

// การทดสอบการเชื่อมต่อ
$db = new DB_con();
// เมื่อเสร็จสิ้นให้ปิดการเชื่อมต่อ
