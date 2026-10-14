<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | AI Resume Analyzer</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            background: linear-gradient(135deg, #101b3f, #2456a6);
        }

        .login-container {
            width: 100%;
            max-width: 420px;
            padding: 35px;
            background: white;
            border-radius: 16px;
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.25);
        }

        .icon {
            width: 65px;
            height: 65px;
            margin: 0 auto 18px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
            background: #e8efff;
            font-size: 30px;
        }

        h1 {
            color: #172554;
            text-align: center;
            font-size: 27px;
            margin-bottom: 8px;
        }

        .subtitle {
            color: #64748b;
            text-align: center;
            font-size: 14px;
            margin-bottom: 28px;
            line-height: 1.5;
        }

        label {
            display: block;
            color: #243047;
            font-weight: bold;
            margin: 16px 0 8px;
            font-size: 14px;
        }

        input {
            width: 100%;
            padding: 13px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font-size: 15px;
            outline: none;
        }

        input:focus {
            border-color: #2456a6;
            box-shadow: 0 0 0 3px #dbeafe;
        }

        .password-box {
            position: relative;
        }

        .password-box input {
            padding-right: 65px;
        }

        .show-password {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            border: none;
            background: transparent;
            color: #2456a6;
            cursor: pointer;
            font-size: 12px;
            font-weight: bold;
        }

        .login-button {
            width: 100%;
            margin-top: 24px;
            padding: 14px;
            border: none;
            border-radius: 8px;
            background: #2456a6;
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        .login-button:hover {
            background: #193f80;
        }

        #message {
            margin-top: 15px;
            text-align: center;
            font-size: 14px;
            line-height: 1.5;
        }

        .back-link {
            display: block;
            margin-top: 22px;
            text-align: center;
            color: #2456a6;
            text-decoration: none;
            font-size: 14px;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        .footer {
            margin-top: 24px;
            text-align: center;
            font-size: 12px;
            color: #94a3b8;
        }
    </style>
</head>

<body>

    <main class="login-container">
        <div class="icon">🔐</div>

        <h1>Admin Login</h1>
        <p class="subtitle">
            AI Resume Analyzer<br>
            Sign in to access the administration panel.
        </p>

        <form id="adminLoginForm">
            <label for="username">Admin Username</label>
            <input
                type="text"
                id="username"
                name="username"
                placeholder="Enter admin username"
                autocomplete="username"
                required
            >

            <label for="password">Password</label>
            <div class="password-box">
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Enter password"
                    autocomplete="current-password"
                    required
                >
                <button
                    type="button"
                    class="show-password"
                    id="togglePassword"
                >SHOW</button>
            </div>

            <button type="submit" class="login-button">
                Login as Admin
            </button>

            <p id="message" role="status" aria-live="polite"></p>
        </form>

        <a href="../home.html" class="back-link">
            ← Back to Home
        </a>

        <p class="footer">
            AI Resume Analyzer © 2026
        </p>
    </main>

    <script>
        const form = document.getElementById("adminLoginForm");
        const password = document.getElementById("password");
        const togglePassword = document.getElementById("togglePassword");
        const message = document.getElementById("message");

        togglePassword.addEventListener("click", function () {
            if (password.type === "password") {
                password.type = "text";
                togglePassword.textContent = "HIDE";
            } else {
                password.type = "password";
                togglePassword.textContent = "SHOW";
            }
        });

        form.addEventListener("submit", async function (event) {
            event.preventDefault();

            message.style.color = "#b45309";
            message.textContent =
                "Login backend is not connected yet. Please connect the PHP authentication API.";

            // Next step: verify admin credentials using PHP and MySQL.
        });
    </script>

</body>
</html>