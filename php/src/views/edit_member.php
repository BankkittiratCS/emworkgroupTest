<?php
require_once '../Database.php'; 

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $db = Database::getInstance();
    $sql = "SELECT * FROM members WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $member = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $prefix = $_POST['prefix'];
        $firstName = $_POST['first_name'];
        $lastName = $_POST['last_name'];
        $date_of_birth = $_POST['date_of_birth'];
        $age = date_diff(date_create($date_of_birth), date_create('today'))->y;
        $profilePicture = $_FILES['profile_picture'];

        if ($profilePicture['error'] == UPLOAD_ERR_OK) {
            $uploadDir = '../uploads/';
            $filename = time() . '_' . basename($profilePicture['name']);
            $uploadFile = $uploadDir . $filename;

            
            move_uploaded_file($profilePicture['tmp_name'], $uploadFile);
            $profilePicturePath = $uploadFile;
        } else {
            $profilePicturePath = $member['profile_picture']; 
        }

        
        $sql = "UPDATE members SET prefix = :prefix, first_name = :first_name, last_name = :last_name, date_of_birth = :date_of_birth, age = :age, profile_picture = :profile_picture WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':prefix', $prefix);
        $stmt->bindParam(':first_name', $firstName);
        $stmt->bindParam(':last_name', $lastName);
        $stmt->bindParam(':date_of_birth', $date_of_birth);
        $stmt->bindParam(':age', $age);
        $stmt->bindParam(':profile_picture', $profilePicturePath);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            header('Location: ../index.php?success=1');
            exit;
        } else {
            echo "เกิดข้อผิดพลาดในการปรับปรุงข้อมูล";
        }
    }
} else {
    echo "ไม่พบรหัสสมาชิก";
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขสมาชิก</title>
</head>
<body>
    <h1>แก้ไขสมาชิก</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="prefix">คำนำหน้าชื่อ:</label>
        <select name="prefix" id="prefix" required>
            <option value="นาย" <?= $member['prefix'] == 'นาย' ? 'selected' : '' ?>>นาย</option>
            <option value="นาง" <?= $member['prefix'] == 'นาง' ? 'selected' : '' ?>>นาง</option>
            <option value="นางสาว" <?= $member['prefix'] == 'นางสาว' ? 'selected' : '' ?>>นางสาว</option>
        </select><br>

        <label for="first_name">ชื่อ:</label>
        <input type="text" name="first_name" id="first_name" value="<?= $member['first_name'] ?>" required><br>

        <label for="last_name">นามสกุล:</label>
        <input type="text" name="last_name" id="last_name" value="<?= $member['last_name'] ?>" required><br>

        <label for="date_of_birth">วันเดือนปีเกิด:</label>
        <input type="date" name="date_of_birth" id="date_of_birth" value="<?= $member['date_of_birth'] ?>" required><br>

        <label for="profile_picture">รูปภาพโปรไฟล์:</label>
        <input type="file" name="profile_picture" id="profile_picture" accept="image/*"><br>

        <input type="submit" value="ปรับปรุงสมาชิก">
    </form>
</body>
</html>
