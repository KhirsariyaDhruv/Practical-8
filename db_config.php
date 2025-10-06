<?php
session_start();
include 'db_connect.php';

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

// Fetch latest 5 events
$sql = "SELECT * FROM events ORDER BY created_at DESC LIMIT 5";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="dashboard">
    <h1>Welcome, <?php echo $_SESSION['user_name']; ?></h1>
    <a href="logout.php" class="logout-btn">Logout</a>
    
    <h2>Latest 5 Events</h2>
    <table>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Event Date</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['event_date']; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>
</body>
</html>
