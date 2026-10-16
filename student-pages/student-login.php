<?php
// Errors screen meeda clear ga kanipinchadaniki idi add chesamu
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

$error_message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Vercel / Remote Database Credentials
    $db_host = getenv('DB_HOST') ?: "localhost";
    $db_user = getenv('DB_USER') ?: "root";
    $db_pass = getenv('DB_PASS') ?: "";
    $db_name = getenv('DB_NAME') ?: "ai_resume_analyzer";

    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

    if (!$conn) {
        $error_message = "Database Connection Failed: " . mysqli_connect_error();
    } else {
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        if (!empty($email) && !empty($password)) {
            // Prepared Statement for SQL Injection Security
            $stmt = mysqli_prepare($conn, "SELECT id, password FROM students WHERE email = ?");
            if ($stmt) {
                mysqli_stmt_bind_param($stmt, "s", $email);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                if ($user = mysqli_fetch_assoc($result)) {
                    // Check password
                    if ($password === $user['password'] || password_verify($password, $user['password'])) {
                        $_SESSION['student_id'] = $user['id'];
                        $_SESSION['student_email'] = $email;

                        header("Location: student-dashboard.php");
                        exit();
                    } else {
                        $error_message = "Invalid Password!";
                    }
                } else {
                    $error_message = "No account found with this Email!";
                }
                mysqli_stmt_close($stmt);
            } else {
                $error_message = "SQL Prepare Error: " . mysqli_error($conn);
            }
        } else {
            $error_message = "Please fill in all fields.";
        }

        mysqli_close($conn);
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
