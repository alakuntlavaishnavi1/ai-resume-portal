<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

$error_message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (!empty($email) && !empty($password)) {
        // Presentation kosam evaru eh email/password ichina direct ga login ayyetattu set chesam
        $_SESSION['student_id'] = 1;
        $_SESSION['student_email'] = $email;

        header("Location: student-dashboard.php");
        exit();
    } else {
        $error_message = "Dayachesi email mariyu password enter cheyandi.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login - AI Resume Portal</title>
    <link rel="icon" href="data:,">
    <link rel="stylesheet" href="../styles/main-style.css">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #e8eaff, #f7f8ff);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .login-card {
            background: #ffffff;
            width: 100%;
            max-width: 400px;
            padding: 35px;
            border-radius: 18px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
        }

        h1 {
            text-align: center;
            color: #6554df;
            margin: 0 0 8px 0;
        }

        .subtitle {
            text-align: center;
            color: #666666;
            margin-bottom: 28px;
            font-size: 15px;
        }

        label {
            display: block;
            margin: 16px 0 8px;
            font-weight: 600;
            color: #333333;
        }

        input {
            width: 100%;
            padding: 13px;
            border: 1px solid #cccccc;
            border-radius: 8px;
            font-size: 14px;
            outline: none;
            transition: border-color 0.2s ease;
        }

        input:focus {
            border-color: #6554df;
        }

        button {
            width: 100%;
            padding: 14px;
            margin-top: 24px;
            border: none;
            border-radius: 8px;
            background: #6554df;
            color: #ffffff;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }
        
        button:hover {
            background: #5243c2;
        }

        .error {
            color: red;
            font-size: 14px;
            text-align: center;
            margin-top: 10px;
            background: #ffe6e6;
            padding: 10px;
            border-radius: 6px;
        }
    </style>
</head>
<body>

    <div class="login-card">
        <h1>Student Login</h1>
        <div class="subtitle">Welcome back! Please login to your account.</div>

        <?php if (!empty($error_message)) { echo '<div class="error">' . $error_message . '</div>'; } ?>

        <form action="" method="POST">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>
        </form>
    </div>

</body>
</html>
