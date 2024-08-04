<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="description" content="Job Management Page">
  <meta name="keywords" content="HTML5, PHP, MySQL">
  <meta name="author" content="Coldpies">
  <title>Manage EOIs - Cold Pies</title>
  <link href="styles/coldpiescss.css" rel="stylesheet"/>
</head>
<body>
  <?php include 'header.inc'; ?>
  <?php include 'menu.inc'; ?>
  <main class="content">
    <h1>Manage EOIs</h1>
    <?php
    require_once 'settings.php';

    // Create connection
    $conn = new mysqli($host, $user, $pwd, $sql_db);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    // Function to display EOIs
    function displayEOIs($result) {
      if ($result->num_rows > 0) {
        echo "<table class='jobs'><tr><th>EOI Number</th><th>Job Reference Number</th><th>First Name</th><th>Last Name</th><th>Date of Birth</th><th>Gender</th><th>Address</th><th>Email</th><th>Phone Number</th><th>Skills</th><th>Other Skills</th><th>Status</th></tr>";
        while($row = $result->fetch_assoc()) {
          echo "<tr><td>" . $row["EOInumber"]. "</td><td>" . $row["JobReferenceNumber"]. "</td><td>" . $row["FirstName"]. "</td><td>" . $row["LastName"]. "</td><td>" . $row["DateOfBirth"]. "</td><td>" . $row["Gender"]. "</td><td>" . $row["Address"]. "</td><td>" . $row["Email"]. "</td><td>" . $row["PhoneNumber"]. "</td><td>" . $row["Skills"]. "</td><td>" . $row["OtherSkills"]. "</td><td>" . $row["Status"]. "</td></tr>";
        }
        echo "</table>";
      } else {
        echo "0 results";
      }
    }

    // List all EOIs
    echo "<h2>List all EOIs</h2>";
    $sql = "SELECT * FROM eoi";
    $result = $conn->query($sql);
    displayEOIs($result);

    // List EOIs by Job Reference Number
    if (isset($_POST['searchByJobRef'])) {
      $jobRef = $_POST['jobref'];
      echo "<h2>List EOIs by Job Reference Number</h2>";
      $sql = "SELECT * FROM eoi WHERE JobReferenceNumber='$jobRef'";
      $result = $conn->query($sql);
      displayEOIs($result);
    }

    // List EOIs by Applicant Name
    if (isset($_POST['searchByName'])) {
      $firstName = $_POST['firstname'];
      $lastName = $_POST['lastname'];
      echo "<h2>List EOIs by Applicant Name</h2>";
      $sql = "SELECT * FROM eoi WHERE FirstName='$firstName' AND LastName='$lastName'";
      $result = $conn->query($sql);
      displayEOIs($result);
    }

    // Delete EOIs by Job Reference Number
    if (isset($_POST['deleteByJobRef'])) {
      $jobRef = $_POST['deletejobref'];
      echo "<h2>Delete EOIs by Job Reference Number</h2>";
      $sql = "DELETE FROM eoi WHERE JobReferenceNumber='$jobRef'";
      if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
      } else {
        echo "Error deleting record: " . $conn->error;
      }
    }

    // Change the Status of an EOI
    if (isset($_POST['changeStatus'])) {
      $eoiNumber = $_POST['eoinumber'];
      $newStatus = $_POST['newstatus'];
      echo "<h2>Change the Status of an EOI</h2>";
      $sql = "UPDATE eoi SET Status='$newStatus' WHERE EOInumber='$eoiNumber'";
      if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
      } else {
        echo "Error updating record: " . $conn->error;
      }
    }

    $conn->close();
    ?>
    <h2>List EOIs by Job Reference Number</h2>
    <form method="post" action="">
      Job Reference Number: <input type="text" name="jobref">
      <input type="submit" name="searchByJobRef" value="Search">
    </form>

    <h2>List EOIs by Applicant Name</h2>
    <form method="post" action="">
      First Name: <input type="text" name="firstname">
      Last Name: <input type="text" name="lastname">
      <input type="submit" name="searchByName" value="Search">
    </form>

    <h2>Delete EOIs by Job Reference Number</h2>
    <form method="post" action="">
      Job Reference Number: <input type="text" name="deletejobref">
      <input type="submit" name="deleteByJobRef" value="Delete">
    </form>

    <h2>Change the Status of an EOI</h2>
    <form method="post" action="">
      EOI Number: <input type="text" name="eoinumber">
      New Status: <input type="text" name="newstatus">
      <input type="submit" name="changeStatus" value="Change Status">
    </form>
  </main>
  <?php include 'footer.inc'; ?>
</body>
</html>
