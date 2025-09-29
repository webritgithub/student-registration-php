<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Student Registration</title>
  <style>
    /* General reset */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Segoe UI", Arial, sans-serif;
    }

    body {
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background: linear-gradient(135deg, #667eea, #764ba2);
      padding: 20px;
    }

    .container {
      background: rgba(255, 255, 255, 0.1);
      padding: 30px;
      border-radius: 12px;
      width: 100%;
      max-width: 400px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
      backdrop-filter: blur(12px);
      text-align: center;
    }

    h2 {
      color: #fff;
      margin-bottom: 20px;
      font-size: 22px;
    }

    label {
      display: block;
      margin: 10px 0 5px;
      color: #e0e0e0;
      font-size: 14px;
      text-align: left;
    }

    input[type=text],
    input[type=email] {
      width: 100%;
      padding: 10px;
      border: none;
      border-radius: 8px;
      margin-bottom: 15px;
      background: rgba(255,255,255,0.2);
      color: #fff;
      font-size: 14px;
      outline: none;
    }

    input::placeholder {
      color: #ddd;
    }

    input[type=submit] {
      width: 100%;
      padding: 12px;
      border: none;
      border-radius: 8px;
      background: #667eea;
      color: #fff;
      font-weight: bold;
      font-size: 15px;
      cursor: pointer;
      transition: 0.3s ease;
    }

    input[type=submit]:hover {
      background: #5765d8;
    }

    .msg {
      color: #4caf50;
      margin-bottom: 10px;
      font-size: 14px;
    }

    .err {
      color: #ff5252;
      margin-bottom: 10px;
      font-size: 14px;
    }

    a {
      color: #fff;
      text-decoration: none;
      font-size: 14px;
      opacity: 0.85;
    }

    a:hover {
      text-decoration: underline;
      opacity: 1;
    }

    .link {
      margin-top: 15px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Student Registration</h2>

    <?php if(isset($_GET['error'])): ?>
      <p class="err"><?php echo htmlspecialchars($_GET['error']); ?></p>
    <?php endif; ?>

    <?php if(isset($_GET['success'])): ?>
      <p class="msg">Student registered successfully.</p>
    <?php endif; ?>

    <form method="post" action="save.php">
      <label>Name</label>
      <input type="text" name="name" placeholder="Enter your name" required>

      <label>Email</label>
      <input type="email" name="email" placeholder="Enter your email" required>

      <label>Course</label>
      <input type="text" name="course" placeholder="Enter your course" required>

      <input type="submit" value="Register">
    </form>

    <div class="link">
      <p><a href="view.php">View Registered Students →</a></p>
    </div>
  </div>
</body>
</html>
