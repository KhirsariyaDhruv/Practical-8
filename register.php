<?php include "db_connect.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Event</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f6f9; margin: 0; padding: 20px; }
        h2 { text-align: center; color: #333; }
        form { max-width: 400px; margin: auto; padding: 20px; background: #fff; border-radius: 8px; box-shadow: 0px 4px 10px rgba(0,0,0,0.1);}
        label { font-weight: bold; display: block; margin-top: 10px; }
        input, textarea { width: 100%; padding: 8px; margin-top: 5px; border: 1px solid #ccc; border-radius: 5px; }
        input[type=submit] { background: #007BFF; color: white; border: none; margin-top: 15px; cursor: pointer; }
        input[type=submit]:hover { background: #0056b3; }
        p { text-align: center; color: green; font-weight: bold; }
    </style>
</head>
<body>
    <h2>Add New Event</h2>
    <form method="POST">
        <label>Title:</label>
        <input type="text" name="title" required>

        <label>Description:</label>
        <textarea name="description" required></textarea>

        <label>Event Date:</label>
        <input type="date" name="event_date" required>

        <input type="submit" name="submit" value="Add Event">
    </form>

<?php
if (isset($_POST['submit'])) {
    $title = htmlspecialchars($_POST['title']);
    $description = htmlspecialchars($_POST['description']);
    $event_date = $_POST['event_date'];

    $sql = "INSERT INTO events (title, description, event_date) 
            VALUES ('$title', '$description', '$event_date')";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Event added successfully!</p>";
    } else {
        echo "<p style='color:red;'>Error: " . $conn->error . "</p>";
    }
}
$conn->close();
?>
</body>
</html>
