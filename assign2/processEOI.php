<?php
require_once 'settings.php';

$conn = new mysqli($host, $user, $pwd, $sql_db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['ref_no'], $_POST['firstname'], $_POST['lastname'], $_POST['birthdate'], $_POST['gender'], $_POST['street'], $_POST['suburb'], $_POST['state'], $_POST['postcode'], $_POST['email'], $_POST['phone'])) {
    $ref_no = $conn->real_escape_string($_POST['ref_no']);
    $firstname = $conn->real_escape_string($_POST['firstname']);
    $lastname = $conn->real_escape_string($_POST['lastname']);
    $birthdate = $conn->real_escape_string($_POST['birthdate']);
    $gender = $conn->real_escape_string($_POST['gender']);
    $street = $conn->real_escape_string($_POST['street']);
    $suburb = $conn->real_escape_string($_POST['suburb']);
    $state = $conn->real_escape_string($_POST['state']);
    $postcode = $conn->real_escape_string($_POST['postcode']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $skills = isset($_POST['skills']) ? implode(', ', $_POST['skills']) : '';
    $other_skills = isset($_POST['other_skills']) ? $conn->real_escape_string($_POST['other_skills']) : '';

    $check_sql = "SELECT JobReferenceNumber FROM job_description WHERE JobReferenceNumber = '$ref_no'";
    $check_result = $conn->query($check_sql);

    if ($check_result->num_rows > 0) {
        $stmt = $conn->prepare("INSERT INTO eoi (JobReferenceNumber, FirstName, LastName, DateOfBirth, Gender, Address, Email, PhoneNumber, Skills, OtherSkills, Status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'New')");
        $address = $street . ', ' . $suburb . ', ' . $state . ', ' . $postcode;
        $stmt->bind_param("ssssssssss", $ref_no, $firstname, $lastname, $birthdate, $gender, $address, $email, $phone, $skills, $other_skills);

        if ($stmt->execute()) {
            echo "New record created successfully. Your EOI number is " . $stmt->insert_id;
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Invalid Job Reference Number.";
    }
} else {
    echo "All required fields must be filled out.";
}

$conn->close();
?>
