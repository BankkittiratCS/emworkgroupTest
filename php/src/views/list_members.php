<?php
require_once '../Database.php'; 

$db = Database::getInstance();
$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';
$sql = "SELECT * FROM members WHERE first_name LIKE :search OR last_name LIKE :search ORDER BY age ASC";
$stmt = $db->prepare($sql);
$searchTerm = "%" . $searchTerm . "%";
$stmt->bindParam(':search', $searchTerm);
$stmt->execute();
$members = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายการสมาชิก</title>
</head>
<body>
    <h1>รายการสมาชิก</h1>
    <form action="" method="get">
        <input type="text" name="search" placeholder="ค้นหาชื่อหรือสกุล" value="<?= htmlspecialchars($searchTerm) ?>">
        <input type="submit" value="ค้นหา">
    </form>

    <table>
        <tr>
            <th>คำนำหน้าชื่อ</th>
            <th>ชื่อ</th>
            <th>นามสกุล</th>
            <th>วันเกิด</th>
            <th>อายุ</th>
            <th>รูปภาพ</th>
            <th>การจัดการ</th>
        </tr>
        <?php foreach ($members as $member): ?>
        <tr>
            <td><?= htmlspecialchars($member['prefix']) ?></td>
            <td><?= htmlspecialchars($member['first_name']) ?></td>
            <td><?= htmlspecialchars($member['last_name']) ?></td>
            <td><?= htmlspecialchars($member['date_of_birth']) ?></td>
            <td><?= htmlspecialchars($member['age']) ?></td>
            <<td><img src="../uploads/<?php echo htmlspecialchars($member['profile_picture']); ?>" alt="Profile Picture" width="100"></td>

            <td>
                <a href="edit_member.php?id=<?= $member['id'] ?>">แก้ไข</a>
                <a href="delete_member.php?id=<?= $member['id'] ?>" onclick="return confirm('แน่ใจว่าต้องการลบสมาชิกนี้?');">ลบ</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
