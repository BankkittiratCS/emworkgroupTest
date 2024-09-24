<?php
require_once '../Database.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $prefix = $_POST['prefix'];
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $date_of_birth = $_POST['date_of_birth'];
    $age = date_diff(date_create($date_of_birth), date_create('today'))->y;
    $profilePicture = $_FILES['profile_picture'];

   
    $uploadDir = '../uploads/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true); 
    }

    $filename = time() . '_' . basename($profilePicture['name']);
    $uploadFile = $uploadDir . $filename;

  
    if (move_uploaded_file($profilePicture['tmp_name'], $uploadFile)) {
       
        $db = Database::getInstance();
        $sql = "INSERT INTO members (prefix, first_name, last_name, date_of_birth, age, profile_picture) VALUES (:prefix, :first_name, :last_name, :date_of_birth, :age, :profile_picture)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':prefix', $prefix);
        $stmt->bindParam(':first_name', $firstName);
        $stmt->bindParam(':last_name', $lastName);
        $stmt->bindParam(':date_of_birth', $date_of_birth);
        $stmt->bindParam(':age', $age);
        $stmt->bindParam(':profile_picture', $filename); 

        if ($stmt->execute()) {
            header('Location: ../index.php?success=1');
            exit;
        } else {
            echo "เกิดข้อผิดพลาดในการบันทึกข้อมูลลงฐานข้อมูล";
        }
    } else {
        echo "เกิดข้อผิดพลาดในการอัปโหลดไฟล์";
    }
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มสมาชิก</title>
</head>
<body>
    <h1>เพิ่มสมาชิก</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="prefix">คำนำหน้าชื่อ:</label>
        <select name="prefix" id="prefix" required>
            <option value="นาย">นาย</option>
            <option value="นาง">นาง</option>
            <option value="นางสาว">นางสาว</option>
        </select><br>

        <label for="first_name">ชื่อ:</label>
        <input type="text" name="first_name" id="first_name" required><br>

        <label for="last_name">นามสกุล:</label>
        <input type="text" name="last_name" id="last_name" required><br>

        <label for="date_of_birth">วันเดือนปีเกิด:</label>
        <input type="date" name="date_of_birth" id="date_of_birth" required><br>

        <label for="profile_picture">รูปภาพโปรไฟล์:</label>
        <input type="file" name="profile_picture" id="profile_picture" accept="image/*" required><br>

        <input type="submit" value="เพิ่มสมาชิก">
    </form>
</body>
</html>
