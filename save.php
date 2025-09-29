<?php
// Show errors for development (remove in production)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// DB config
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "studentdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Basic sanitization
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $course = trim($_POST['course'] ?? '');

    if ($name === '' || $email === '' || $course === '') {
        header("Location: index.php?error=" . urlencode("Please fill all fields"));
        exit;
    }

    // Prepared statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO students (name, email, course) VALUES (?, ?, ?)");
    if (!$stmt) {
        echo "Prepare failed: " . $conn->error;
        exit;
    }
    $stmt->bind_param("sss", $name, $email, $course);

    if ($stmt->execute()) {
        header("Location: index.php?success=1");
        exit;
    } else {
        header("Location: index.php?error=" . urlencode("Database error: " . $stmt->error));
        exit;
    }

    $stmt->close();
}

$conn->close();
?>
