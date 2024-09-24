<?php
require_once '../Database.php'; 

$db = Database::getInstance();
$sql = "SELECT age, COUNT(*) as count FROM members GROUP BY age";
$stmt = $db->prepare($sql);
$stmt->execute();
$ageCounts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>รายงานจำนวนสมาชิกตามอายุ</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h1>รายงานจำนวนสมาชิกตามอายุ</h1>
    <canvas id="ageChart" width="400" height="200"></canvas>

    <script>
        const ctx = document.getElementById('ageChart').getContext('2d');
        
     
        const ageData = <?= json_encode($ageCounts) ?>;
        const labels = ageData.map(item => item.age); 
        const dataCounts = ageData.map(item => item.count); 

        const ageChart = new Chart(ctx, {
            type: 'bar', 
            data: {
                labels: labels,
                datasets: [{
                    label: 'จำนวนสมาชิก',
                    data: dataCounts,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
