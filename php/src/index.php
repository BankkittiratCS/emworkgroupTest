<?php
require_once 'Database.php';

$db = Database::getInstance();
$sql = "SELECT * FROM members ORDER BY age";
$stmt = $db->prepare($sql);
$stmt->execute();
$members = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>ระบบจัดการสมาชิก</title>
</head>
<body>
<div class="container mt-5">
    <h1>ระบบจัดการสมาชิก</h1>
    <a href="views/add_member.php" class="btn btn-primary mb-3">เพิ่มสมาชิก</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>คำนำหน้าชื่อ</th>
                <th>ชื่อ</th>
                <th>นามสกุล</th>
                <th>วันเกิด</th>
                <th>อายุ</th>
                <th>รูปโปรไฟล์</th>
                <th>การกระทำ</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($members as $member): ?>
                <tr>
                    <td><?php echo htmlspecialchars($member['prefix']); ?></td>
                    <td><?php echo htmlspecialchars($member['first_name']); ?></td>
                    <td><?php echo htmlspecialchars($member['last_name']); ?></td>
                    <td><?php echo htmlspecialchars($member['date_of_birth']); ?></td>
                    <td><?php echo htmlspecialchars($member['age']); ?></td>
                    <td><img src="../uploads/<?php echo htmlspecialchars($member['profile_picture']); ?>" alt="Profile Picture" width="100"></td>

                    <td>
                        <a href="views/edit_member.php?id=<?php echo $member['id']; ?>" class="btn btn-warning btn-sm">แก้ไข</a>
                        <a href="views/delete_member.php?id=<?php echo $member['id']; ?>" class="btn btn-danger btn-sm">ลบ</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
