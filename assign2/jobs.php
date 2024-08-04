<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="description" content="Job information">
  <meta name="keywords" content="HTML5, PHP, MySQL">
  <meta name="author" content="Coldpies">
  <title>Job Information - Cold Pies</title>
  <link href="styles/coldpiescss.css" rel="stylesheet"/>
</head>
<body>
  <?php include 'header.inc'; ?>
  <?php include 'menu.inc'; ?>
  <main class="content">
    <h1>Job Information Page</h1>
    <hr>
    <?php
    require_once 'settings.php';

    $conn = new mysqli($host, $user, $pwd, $sql_db);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT JobReferenceNumber, JobTitle, JobDescription, KeyResponsibilities, RequiredQualifications, Salary FROM job_description";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<section>";
            echo "<h1>" . htmlspecialchars(trim($row["JobTitle"])) . "</h1>";
            echo "<p><strong>Job Reference:</strong> " . htmlspecialchars(trim($row["JobReferenceNumber"])) . "<br>";
            echo "<strong>Reports to:</strong> IT Department Manager</p>";
            echo "<p>" . nl2br(htmlspecialchars(trim($row["JobDescription"]))) . "</p>";
            echo "<h2>Key Responsibilities:</h2>";
            echo "<ul>";
            $responsibilities = explode("\n", trim($row["KeyResponsibilities"]));
            foreach ($responsibilities as $responsibility) {
                echo "<li>" . htmlspecialchars(trim($responsibility)) . "</li>";
            }
            echo "</ul>";
            echo "<h2>Required Qualifications:</h2>";
            echo "<ul>";
            $qualifications = explode("\n", trim($row["RequiredQualifications"]));
            foreach ($qualifications as $qualification) {
                echo "<li>" . htmlspecialchars(trim($qualification)) . "</li>";
            }
            echo "</ul>";
            echo "<p><strong>Salary:</strong> " . htmlspecialchars(trim($row["Salary"])) . "</p>";
            echo "</section>";
            echo "<hr>";
        }
    } else {
        echo "0 results";
    }

    $conn->close();
    ?>
  </main>

  <?php include 'footer.inc'; ?>
</body>
</html>
