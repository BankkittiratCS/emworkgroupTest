<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ลงทะเบียน</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- As a link -->
    <div class="slidshow">
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand" href="#">Navbar</a>
        </nav>
    </div>

    <!-- As a heading -->

    <div class="container mt-5">
        <h1 class="text-center mb-4">ลงทะเบียน</h1>
        <div class="card">
            <div class="card-body">
                <form id="registerForm" method="POST">
                    <div class="mb-3">
                        <label for="fullname" class="form-label">ชื่อ-สกุล</label>
                        <input type="text" class="form-control" id="fullname" name="fullname" required>
                    </div>
                    <div class="mb-3">
                        <label for="dateofB" class="form-label">วัน เดือน ปี เกิด</label>
                        <input type="dateofB" class="form-control" id="dateofB" name="dateofB" required>
                    </div>
                    <div class="mb-3">
                        <label for="Tell" class="form-label">เบอร์โทรศัพท์</label>
                        <input type="Tell" class="form-control" id="Tell" name="Tell" required>
                    </div>
                    <div class="mb-3">
                        <label for="Address" class="form-label">ที่อยู่</label>
                        <input type="Address" class="form-control" id="Address" name="Address" required>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
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
                    <div class="mb-3">
                        <label for="Dateofregister" class="form-label">วันที่สมัคร</label>
                        <input type="Dateofregister" class="form-control" id="Dateofregister" name="Dateofregister" required>
                    </div>


                    <button type="submit" name="submit" class="btn btn-primary">ลงทะเบียน</button>
                </form>
                <p class="mt-3 text-center">มีบัญชีอยู่แล้ว? <a href="index.php">เข้าสู่ระบบ</a></p>
            </div>
        </div>
    </div>
   <?php include_once('Footer.php'); ?>
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
    <style>
        .slidshow {
             
                position: sticky;
                top: 0;
            
        }
    </style>
</body>

</html>