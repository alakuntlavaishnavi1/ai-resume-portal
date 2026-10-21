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
        
        /* Roadmap Clickable Styles */
        .roadmap-links span {
            color: #2b6cb0;
            cursor: pointer;
            text-decoration: underline;
            font-weight: bold;
        }
        .roadmap-links span:hover {
            color: #1a365d;
        }
        /* Modal Styles */
        .modal {
            display: none; 
            position: fixed; 
            z-index: 1000; 
            left: 0; 
            top: 0; 
            width: 100%; 
            height: 100%; 
            background-color: rgba(0,0,0,0.5);
        }
        .modal-content {
            background-color: #fff;
            margin: 15% auto;
            padding: 20px;
            border-radius: 8px;
            width: 80%;
            max-width: 500px;
            position: relative;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }
        .close-btn {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }
        .close-btn:hover {
            color: #000;
        }
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
            
            <form action="student-dashboard.php" method="POST" enctype="multipart/form-data">
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
                
                <!-- Clickable Roadmap Links -->
                <p class="roadmap-links" style="font-size: 16px;">
                    <span onclick="openRoadmap('Beginner')">Beginner</span> ➔ 
                    <span onclick="openRoadmap('Intermediate')">Intermediate</span> ➔ 
                    <span onclick="openRoadmap('Advanced')">Advanced</span>
                </p>
            </div>
        <?php endif; ?>
    </div>

    <!-- Roadmap Popup Modal -->
    <div id="roadmapModal" class="modal">
        <div class="modal-content">
            <span class="close-btn" onclick="closeRoadmap()">&times;</span>
            <h3 id="modalTitle">Roadmap Details</h3>
            <p id="modalText">Loading...</p>
        </div>
    </div>

    <!-- JavaScript for Modal Popup -->
    <script>
        function openRoadmap(level) {
            const modal = document.getElementById('roadmapModal');
            const title = document.getElementById('modalTitle');
            const text = document.getElementById('modalText');
            
            title.innerText = level + " Roadmap";
            
            if (level === 'Beginner') {
                text.innerHTML = "<ul><li>Learn basic programming (Python/Java)</li><li>Understand HTML, CSS, JavaScript basics</li><li>Learn Git & GitHub basics</li></ul>";
            } else if (level === 'Intermediate') {
                text.innerHTML = "<ul><li>Master Data Structures & Algorithms (DSA)</li><li>Work with Databases (SQL/MongoDB)</li><li>Build small full-stack projects</li></ul>";
            } else if (level === 'Advanced') {
                text.innerHTML = "<ul><li>Learn Cloud Services (AWS / Azure)</li><li>System Design & Architecture</li><li>Contribute to Open Source & Deploy Projects</li></ul>";
            }
            
            modal.style.display = "block";
        }

        function closeRoadmap() {
            document.getElementById('roadmapModal').style.display = "none";
        }

        // Close modal when clicking outside of it
        window.onclick = function(event) {
            const modal = document.getElementById('roadmapModal');
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

</body>
</html>
