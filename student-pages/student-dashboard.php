<?php
session_start();

if (!isset($_SESSION['student_email'])) {
    header("Location: student-login.php");
    exit();
}

$student_email = $_SESSION['student_email'];
$show_results = false;

// Form Submit అయినప్పుడు మాత్రమే రిజల్ట్ కనిపిస్తుంది
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $show_results = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard - ResumeAI</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f6f9; margin: 0; color: #333; }
        .navbar { background: #1a365d; color: white; padding: 15px 30px; display: flex; justify-content: space-between; align-items: center; }
        .navbar a { color: white; text-decoration: none; margin-left: 20px; font-weight: bold; }
        .container { max-width: 800px; margin: 30px auto; padding: 20px; }
        .card { background: white; padding: 25px; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.08); margin-bottom: 25px; }
        h3 { color: #1a365d; border-bottom: 2px solid #e2e8f0; padding-bottom: 8px; margin-top: 0; }
        .upload-btn { background: #2b6cb0; color: white; padding: 10px 20px; border: none; border-radius: 6px; cursor: pointer; font-size: 15px; margin-top: 10px; }
        .score { font-size: 28px; font-weight: bold; color: #2b6cb0; margin: 15px 0; }
        .found { color: #2e7d32; margin: 6px 0; font-size: 16px; font-weight: 500; }
        .missing { color: #c62828; margin: 6px 0; font-size: 16px; font-weight: 500; }
        .salary { background: #e2e8f0; padding: 10px 15px; border-radius: 20px; display: inline-block; font-weight: bold; margin-top: 12px; color: #1a365d; }
    </style>
</head>
<body>

    <div class="navbar">
        <h2>ResumeAI Portal</h2>
        <div>
            <a href="../home.php">Home</a>
            <a href="logout.php">Logout</a>
        </div>
    </div>

    <div class="container">
        <!-- Dashboard Welcome & Upload Card -->
        <div class="card">
            <h2>Welcome, Vaishnavi!</h2>
            <p>Upload your resume PDF to view the complete analysis report.</p>
            
            <form action="student-dashboard-new.php" method="POST" enctype="multipart/form-data">
                <input type="file" name="resume" accept=".pdf" required><br><br>
                <button type="submit" class="upload-btn">Analyze Resume</button>
            </form>
        </div>

        <!-- Notebook Exact Format Output -->
        <?php if ($show_results): ?>
            <div class="card">
                <h3>1. Resume Analysis Result</h3>
                <div class="score">Resume Score: 85/100</div>
                
                <h4>Skills Found:</h4>
                <div class="found">✔ Python</div>
                <div class="found">✔ SQL</div>
                <div class="found">✔ HTML</div>
                <div class="found">✔ CSS</div>

                <h4 style="margin-top: 20px;">Missing Skills:</h4>
                <div class="missing">✖ DSA</div>
                <div class="missing">✖ Git</div>
                <div class="missing">✖ AWS</div>
            </div>

            <div class="card">
                <h3>2. Job Recommendations</h3>
                <ol style="font-size: 16px; line-height: 1.8;">
                    <li><b>Python Developer</b></li>
                    <li><b>Data Analyst</b></li>
                    <li><b>Software Engineer</b></li>
                </ol>
                <div class="salary">Expected Salary: 6 LPA - 12 LPA</div>
            </div>

            <div class="card">
                <h3>3. Learning Resources & Roadmap</h3>
                <h4>Recommended Courses:</h4>
                <ul style="line-height: 1.8;">
                    <li>DSA (Data Structures & Algorithms)</li>
                    <li>Git & GitHub</li>
                    <li>AWS Basics</li>
                </ul>
                <h4 style="margin-top: 20px;">Roadmap:</h4>
                <p style="font-weight: bold; color: #2b6cb0; font-size: 16px;">Beginner ➔ Intermediate ➔ Advanced</p>
            </div>
        <?php endif; ?>
    </div>

</body>
</html>
