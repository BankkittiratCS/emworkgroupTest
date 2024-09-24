<?php
require_once '../Database.php'; 

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    
    $db = Database::getInstance();
    $sql = "DELETE FROM members WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        header('Location: ../index.php?success=1');
        exit;
    } else {
        echo "เกิดข้อผิดพลาดในการลบข้อมูล";
    }
} else {
    echo "ไม่พบรหัสสมาชิก";
}
?>
