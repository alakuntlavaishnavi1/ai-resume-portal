<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Register - ResumeAI</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f9; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .register-card { background: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); width: 350px; }
        h1 { text-align: center; color: #333; }
        p { text-align: center; color: #666; }
        label { display: block; margin-top: 15px; font-weight: bold; color: #444; }
        input { width: 100%; padding: 10px; margin-top: 5px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        button { width: 100%; background-color: #28a745; color: white; padding: 10px; border: none; border-radius: 4px; margin-top: 20px; font-size: 16px; cursor: pointer; }
        button:hover { background-color: #218838; }
        .message { text-align: center; margin-top: 15px; color: red; }
    </style>
</head>
<body>

    <div class="register-card">
        <h1>ResumeAI</h1>
        <p>Create Your Student Account</p>

        <!-- Registration Form pointing to register.php -->
        <form id="registerForm" action="../register.php" method="POST">
            
            <label for="name">Full Name</label>
            <input type="text" id="name" name="fullname" placeholder="Enter your full name" required>

            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Create a password" minlength="8" required>

            <label for="confirmPassword">Confirm Password</label>
            <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Re-enter password" required>

            <button type="submit">Create Account</button>
        </form>

        <p id="message" class="message"></p>

        <p style="margin-top: 15px;">Already registered? <a href="student-login.html">Login</a></p>
        <p><a href="../home.html">Back to Home</a></p>
    </div>

</body>
</html>