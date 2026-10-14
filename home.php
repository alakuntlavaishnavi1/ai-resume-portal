<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Resume Portal</title>
    <link rel="stylesheet" href="styles/main-style.css">
</head>
<body>

    <!-- HEADER SECTION -->
    <header class="header">
        <div class="container">
            <div class="navbar">
                <a href="home.php" class="logo">AI Resume Portal</a>

                <button class="menu-button" id="menuButton" aria-label="Toggle navigation" aria-expanded="false" type="button">
                    ≡
                </button>

                <nav class="navigation" id="navigation">
                    <a href="home.php">Home</a>
                    <a href="#features">Features</a>
                    <a href="#how-it-works">How It Works</a>
                    <!-- సరిచేసిన PHP లింక్‌లు -->
                    <a href="student-pages/student-login.php">Student Login</a>
                    <a href="admin-pages/admin-login.php">Admin Login</a>
                </nav>
            </div>
        </div>
    </header>

    <!-- HERO SECTION -->
    <main>
        <section class="hero">
            <div class="container hero-content">
                <div class="hero-text">
                    <h1>Optimize Your Resume with AI</h1>
                    <p>Get instant feedback, ATS score optimization, and expert suggestions to land your dream job.</p>
                </div>
            </div>
        </section>
    </main>

    <script src="scripts/portal-script.js"></script>
</body>
</html>