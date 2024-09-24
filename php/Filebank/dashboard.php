<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

</head>

<body>
    <div class="sidebar">
        <h2>My Dashboard</h2>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Analytics</a></li>
            <li><a href="#">Projects</a></li>
            <li><a href="#">Settings</a></li>
        </ul>
    </div>
    <div class="main-content">
        <div class="header">
            <h1>Dashboard Overview</h1>
        </div>
        <div class="cards">
            <div class="card">
                <h3>Revenue</h3>
                <p>$8,560</p>
            </div>
            <div class="card">
                <h3>User Engagement</h3>
                <p>75%</p>
            </div>
            <div class="card">
                <h3>Task Progress</h3>
                <p>45%</p>
            </div>
        </div>
        <div class="chart">
            <h3>Performance Chart</h3>
            <canvas id="myChart"></canvas>
        </div>
    </div>
    <script src="script.js"></script>
</body>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Arial', sans-serif;
        display: flex;
        height: 100vh;
        background-color: #1c1c1c;
        /* Darker background tone */
        color: #e0e0e0;
        /* Light text for contrast */
    }

    .sidebar {
        width: 250px;
        background-color: #262626;
        padding: 20px;
        color: #e0e0e0;
        height: 100vh;
    }

    .sidebar h2 {
        margin-bottom: 20px;
        font-size: 24px;
        color: #f05454;
        /* Bold red color */
    }

    .sidebar ul {
        list-style-type: none;
    }

    .sidebar ul li {
        margin-bottom: 20px;
    }

    .sidebar ul li a {
        text-decoration: none;
        color: #e0e0e0;
        font-size: 18px;
    }

    .sidebar ul li a:hover {
        color: #f05454;
        /* Red hover effect */
    }

    .main-content {
        flex-grow: 1;
        padding: 40px;
        background-color: #1a1a1a;
    }

    .header {
        margin-bottom: 20px;
    }

    .header h1 {
        font-size: 32px;
        color: #f05454;
    }

    .cards {
        display: flex;
        justify-content: space-between;
        margin-bottom: 40px;
    }

    .card {
        background-color: #262626;
        border-radius: 8px;
        padding: 20px;
        width: 30%;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .card h3 {
        color: #f05454;
    }

    .card p {
        font-size: 24px;
    }

    .chart {
        background-color: #262626;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .chart h3 {
        color: #f05454;
    }
</style>
<script>
    // Sample chart using Chart.js
    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [{
                label: 'Performance',
                data: [65, 59, 80, 81, 56, 55, 40],
                backgroundColor: 'rgba(240, 84, 84, 0.2)', // Red tone
                borderColor: 'rgba(240, 84, 84, 1)', // Darker red for lines
                borderWidth: 2
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

</html>