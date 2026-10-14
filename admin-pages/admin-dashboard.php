<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | AI Resume Analyzer</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f1f5f9;
            color: #1e293b;
        }

        header {
            background: #172554;
            color: white;
            padding: 20px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        header h1 {
            font-size: 23px;
        }

        .logout {
            color: white;
            text-decoration: none;
            border: 1px solid white;
            padding: 9px 15px;
            border-radius: 7px;
        }

        main {
            max-width: 1100px;
            margin: 35px auto;
            padding: 0 20px;
        }

        .welcome {
            margin-bottom: 25px;
        }

        .welcome p {
            color: #64748b;
            margin-top: 8px;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 3px 12px #0000000d;
        }

        .card h3 {
            color: #64748b;
            font-size: 15px;
            margin-bottom: 15px;
        }

        .card p {
            color: #2456a6;
            font-size: 30px;
            font-weight: bold;
        }

        .notice {
            background: white;
            padding: 25px;
            margin-top: 25px;
            border-radius: 12px;
            line-height: 1.8;
        }

        .notice h2 {
            margin-bottom: 10px;
        }

        .notice p {
            color: #64748b;
        }

        footer {
            text-align: center;
            color: #64748b;
            padding: 25px;
        }
    </style>
</head>

<body>

    <header>
        <h1>AI Resume Analyzer — Admin</h1>
        <a class="logout" href="admin-login.html">Back to Login</a>
    </header>

    <main>
        <section class="welcome">
            <h2>Welcome, Admin!</h2>
            <p>Manage and monitor the resume analyzer system.</p>
        </section>

        <section class="cards">
            <div class="card">
                <h3>Total Students</h3>
                <p>--</p>
            </div>

            <div class="card">
                <h3>Resumes Analyzed</h3>
                <p>--</p>
            </div>

            <div class="card">
                <h3>Registered Admins</h3>
                <p>--</p>
            </div>
        </section>

        <section class="notice">
            <h2>System Overview</h2>
            <p>
                Dashboard ready for development.
                Student records, resume analysis statistics,
                and admin management will appear here after
                connecting the PHP backend and MySQL database.
            </p>
        </section>
    </main>

    <footer>
        AI Resume Analyzer © 2026
    </footer>

</body>
</html>