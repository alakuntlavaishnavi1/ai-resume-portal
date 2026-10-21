<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Resume Portal</title>
    <!-- Favicon missing warning ni prevent cheyadanki -->
    <link rel="icon" href="data:,">
    <!-- Corrected CSS Path -->
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
                    <!-- Navigation Links -->
                    <a href="student-pages/student-login.php">Student Login</a>
                    <a href="admin-pages/admin-login.php">Admin Login</a>
                </nav>
            </div>
        </div>
    </header>

    <!-- HERO SECTION -->
    <main>
        <section class="hero" id="home">
            <div class="container hero-content">
                <div class="hero-text">
                    <h1>Optimize Your Resume with AI</h1>
                    <p>Get instant feedback, ATS score optimization, and expert suggestions to land your dream job.</p>
                </div>
            </div>
        </section>

        <!-- FEATURES SECTION -->
        <section id="features" class="container" style="padding: 50px 0;">
            <h2>Features</h2>
            <p>Explore AI-driven resume scoring, ATS check, and keyword suggestions.</p>
        </section>

        <!-- HOW IT WORKS SECTION -->
        <section id="how-it-works" class="container" style="padding: 50px 0;">
            <h2>How It Works</h2>
            <p>Upload your resume, analyze ATS compatibilty, and apply recommendations.</p>
        </section>
    </main>

    <!-- FOOTER SECTION -->
    <footer style="background: #333; color: #fff; text-align: center; padding: 20px 0; margin-top: 40px;">
        <p>&copy; 2026 AI Resume Portal. All rights reserved.</p>
    </footer>

    <!-- Corrected Script Path -->
    <script src="scripts/portal-script.js"></script>
</body>
</html>
