<?php
require_once("dbconnect.php");
require_once("RegisterAndloginsystem.php");
$userdata = new loging();
if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $userdata->login($username, $password);}
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">เข้าสู่ระบบ</h1>
        <div class="card">
            <div class="card-body">
                <form method="POST">
                    <div class="mb-3">
                        <label for="username" class="form-label">ชื่อผู้ใช้</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">รหัสผ่าน</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" name="login" class="btn btn-primary">เข้าสู่ระบบ</button>
                </form>
                <p class="mt-3 text-center">ยังไม่มีบัญชี? <a href="register.php">ลงทะเบียน</a></p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js">
        
            document.getElementById('registerForm').addEventListener('submit', function(event) {
                // ป้องกันการส่งฟอร์มเพื่อให้สามารถรีเซ็ตข้อมูลได้
                event.preventDefault();

                // เพิ่มโค้ดสำหรับการส่งข้อมูลที่นี่ (เช่น AJAX หรือการส่งข้อมูลตามปกติ)

                // รีเซ็ตฟอร์มหลังจากส่งข้อมูล
                this.reset(); // เคลียร์ข้อมูลในฟอร์ม
            });
    </script>

    </script>

</body>

</html>
