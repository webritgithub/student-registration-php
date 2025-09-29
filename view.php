<?php
// DB config
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "studentdb";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM students ORDER BY created_at DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Registered Students</title>
  <style>
    body {
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #667eea, #764ba2);
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: flex-start;
      min-height: 100vh;
    }

    .container {
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(12px);
      padding: 30px;
      border-radius: 16px;
      margin-top: 40px;
      width: 90%;
      max-width: 900px;
      box-shadow: 0 8px 25px rgba(0,0,0,0.3);
      color: white;
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
      font-size: 28px;
      color: #fff;
    }

    a {
      display: inline-block;
      margin-bottom: 20px;
      text-decoration: none;
      color: #fff;
      background: #4CAF50;
      padding: 10px 18px;
      border-radius: 8px;
      transition: 0.3s ease;
    }

    a:hover {
      background: #45a049;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      border-radius: 12px;
      overflow: hidden;
    }

    th {
      background: rgba(0, 0, 0, 0.3);
      padding: 12px;
      text-align: left;
      color: #f2f2f2;
    }

    td {
      padding: 10px;
      background: rgba(255, 255, 255, 0.15);
      color: #fff;
    }

    tr:hover td {
      background: rgba(255, 255, 255, 0.25);
      transition: 0.3s;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Registered Students</h2>
    <p><a href="index.php">⬅ Back to Registration</a></p>

    <table>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Course</th>
        <th>Registered At</th>
      </tr>
      <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
          <td><?php echo htmlspecialchars($row['id']); ?></td>
          <td><?php echo htmlspecialchars($row['name']); ?></td>
          <td><?php echo htmlspecialchars($row['email']); ?></td>
          <td><?php echo htmlspecialchars($row['course']); ?></td>
          <td><?php echo htmlspecialchars($row['created_at']); ?></td>
        </tr>
      <?php endwhile; ?>
    </table>
  </div>
<?php $conn->close(); ?>
</body>
</html>
