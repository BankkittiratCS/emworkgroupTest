<?php require_once "Employee.php";
require_once "RegisterAndloginsystem.php";
session_start();

$authlogin = new Auth();

if ($authlogin->isLoggedIn()) {
    // ผู้ใช้ล็อกอินสำเร็จแล้ว

} else {
    // ถ้าไม่ล็อกอิน ให้เปลี่ยนเส้นทางกลับไปที่หน้า login
    echo "<script>
        alert('กรุณา Login ก่อนสาว');
        window.location.href = 'index.php';
    </script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ข้อมูลพนักงาน</title>

</head>

<body class="Setbody">
    <div>
        <?php include_once("Navbar.php"); ?>
    </div>
    <div class="container">
        <h1>ข้อมูลพนักงาน</h1>
        <div class="employee">

            <?php
            $pro1->ShowData();
            $pro1->skill("PHP", "Python");
            $pro2->ShowData();
            $pro2->skill("Java");
            $pro3->ShowData();
            $pro3->skill(); ?>

        </div>
    </div>
    <script src="script.js"></script>
</body>

<style>
    .container {
        margin: 15px;
        /* กำหนดค่ามาร์จินให้ถูกต้อง */
        padding: 15px;
        /* กำหนดค่าพัดดิงให้ถูกต้อง */
        display: grid;
        /* ใช้ grid สำหรับการจัดเรียง */

        gap: 15px;
        /* เพิ่มระยะห่างระหว่างกริด */
    }

    .employee {
        margin: 15px;
        /* กำหนดค่ามาร์จินให้ถูกต้อง */
        padding: 15px;
        /* กำหนดค่าพัดดิงให้ถูกต้อง */
        display: grid;
        /* ใช้ grid สำหรับการจัดเรียง */

        gap: 15px;
        /* เพิ่มระยะห่างระหว่างกริด */
    }
</style>

</html>