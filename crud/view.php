<?php
include 'config.php';

$id = $_GET['id']; // Get the ID from the URL

// Query the database for the user with the specific ID
$sql = "SELECT * FROM users WHERE id=$id";
$result = $conn->query($sql);

// Check if a record is found
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    die("User not found.");
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View User</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>User Details</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">User ID: <?php echo $user['id']; ?></h5>
            <p class="card-text"><strong>Name:</strong> <?php echo htmlspecialchars($user['name']); ?></p>
            <p class="card-text"><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
            <a href="index.php" class="btn btn-primary">Back to List</a>
        </div>
    </div>
</div>
</body>
</html>
