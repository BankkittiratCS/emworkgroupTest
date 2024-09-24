<?php
require_once("RegisterAndloginsystem.php");
$userdata = new register();
if (!$userdata->getConnection()) {
    die("ไม่สามารถเชื่อมต่อฐานข้อมูล");
}

if (isset($_POST["submit"])) {
    // ดึงข้อมูลจากฟอร์ม
    $fname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // เรียกใช้งานฟังก์ชันลงทะเบียน
    $sql = $userdata->registration($fname, $username, $email, $password);

    // ตรวจสอบผลลัพธ์
    if ($sql) {
        echo "<script>alert('ลงทะเบียนเสร็จสิ้น');</script>";
        echo "<script>window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('ลงทะเบียนไม่สำเร็จ');</script>";
        echo "<script>window.location.href='index.php';</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ลงทะเบียน</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">ลงทะเบียน</h1>
        <div class="card">
            <div class="card-body">
                <form id="registerForm"  method="POST">
                    <div class="mb-3">
                        <label for="fullname" class="form-label">ชื่อ-สกุล</label>
                        <input type="text" class="form-control" id="fullname" name="fullname" required>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">ชื่อผู้ใช้</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">อีเมล</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">รหัสผ่าน</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="confirm_password" class="form-label">ยืนยันรหัสผ่าน</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                        <div id="passwordError" class="text-danger mt-2" style="display: none;">รหัสผ่านไม่ตรงกัน</div>
                    </div>
                    <button type="submit" name = "submit" class="btn btn-primary">ลงทะเบียน</button>
                </form>
                <p class="mt-3 text-center">มีบัญชีอยู่แล้ว? <a href="index.php">เข้าสู่ระบบ</a></p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('registerForm').addEventListener('submit', function(event) {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirm_password').value;
            const passwordError = document.getElementById('passwordError');

            if (password !== confirmPassword) {
                event.preventDefault(); // ป้องกันการส่งฟอร์ม
                passwordError.style.display = 'block'; // แสดงข้อความผิดพลาด
            } else {
                passwordError.style.display = 'none'; // ซ่อนข้อความผิดพลาด
            }
        });
    </script>
</body>
</html>

