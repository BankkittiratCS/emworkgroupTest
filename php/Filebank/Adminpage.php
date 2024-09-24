<?php
require_once("RegisterAndloginsystem.php");
if ($_SESSION['UserStatus'] != "Admin") {
    echo "<script>alert('Your are not Admin!!')</script>";
    echo "<script>window.location.href='index.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php include_once("Navbar.php"); ?>
    <h1>AdminPage</h1>
</body>

</html>