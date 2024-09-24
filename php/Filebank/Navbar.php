<?php
require_once("dbconnect.php");
require_once "RegisterAndloginsystem.php";
if (isset($_POST["logout"])) {
    $authlogout = new Auth();
    $authlogout->logout();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar Example</title>
    <!-- เชื่อมโยงไฟล์ CSS ของ Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <!-- Navbar ของ Bootstrap 5 -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Company Logo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Contact</a>
                    </li>
                </ul>
                <span class="navbar-text text-white">
                    <?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'ไม่พบชื่อผู้ใช้'; ?>
                </span>
                <?php
                if (isset($_SESSION['username'])) {
                    echo "<form method='post' class='d-inline'>
                    <button class='btn btn-outline-danger ms-2' type='submit' name='logout'>Logout</button>
                </form>";
                } else {
                    echo "<button class='btn btn-outline-danger ms-2' type='button' onclick='Gologin()'>Login</button>";
                }
                ?>
            </div>
        </div>
    </nav>


    <!-- เชื่อมโยงไฟล์ JS ของ Bootstrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
<script>
    function Gologin() {
        window.location.href = "LoginPage.php";
    }
</script>

</html>