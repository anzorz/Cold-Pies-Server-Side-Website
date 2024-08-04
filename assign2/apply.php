<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="description" content="Job information and Application" />
  <meta name="keywords" content="HTML5, tags" />
  <meta name="author" content="Coldpies-Name"  />
  <title>ColdpiesTestCase</title>
  <link href="styles/coldpiescss.css" rel="stylesheet"/>
</head>
<body>
    <div id="side-bar" class="sidebar">
        <?php include 'header.inc'; ?>
        <?php include 'menu.inc'; ?>
    </div>
<!-- Write html body here, leave the footer (for stylistic reasons) -->
    <div class="content" class="apply">
        <h1>Job Application Form</h1>
        <hr>
        <form id="help_desk_appointment" method="post" action="processEOI.php" novalidate="novalidate">
            <p>
                <label for="ref_no">Job Reference Number</label>
                <select name="ref_no" id="ref_no" required="required">
                    <option value="">Please select</option>
                    <?php
                    require_once 'settings.php';
                    $conn = new mysqli($host, $user, $pwd, $sql_db);
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    $sql = "SELECT JobReferenceNumber FROM job_description";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<option value="' . $row['JobReferenceNumber'] . '">' . $row['JobReferenceNumber'] . '</option>';
                        }
                    }
                    $conn->close();
                    ?>
                </select>
            </p>
            <fieldset>
                <legend>Personal Details</legend>
                <p>
                    <label for="firstname">First Name</label>
                    <input type="text" name="firstname" id="firstname" maxlength="20" pattern="[a-zA-Z ]+" required="required" placeholder="Max 20 characters">
                    <label for="lastname">Last Name</label>
                    <input type="text" name="lastname" id="lastname" maxlength="20" pattern="[a-zA-Z ]+" required="required" placeholder="Max 20 characters">
                    <label for="birthdate">Date of Birth</label>
                    <input type="text" name="birthdate" id="birthdate" placeholder="dd/mm/yyyy" pattern="\d{1,2}/\d{1,2}/\d{4}" required="required">
                </p>
            </fieldset><br>
            <fieldset>
                <legend>Gender</legend>
                <p>
                    <label for="male">Male</label>
                    <input type="radio" name="gender" id="male" value="m" required="required">
                    <label for="female">Female</label>
                    <input type="radio" name="gender" id="female" value="f">
                    <label for="other">Other</label>
                    <input type="radio" name="gender" id="other" value="x">
                </p>
            </fieldset><br>
            <fieldset>
                <legend>Address</legend>
                <p>
                    <label for="street">Street Address</label>
                    <input type="text" name="street" id="street" maxlength="40" required="required">
                    <label for="suburb">Suburb/town</label>
                    <input type="text" name="suburb" id="suburb" maxlength="40" required="required">
                    <label for="state">State</label>
                    <select name="state" id="state" required="required">
                        <option value="" selected="selected">Please select</option>
                        <option value="VIC">VIC</option>
                        <option value="NSW">NSW</option>
                        <option value="QLD">QLD</option>
                        <option value="NT">NT</option>
                        <option value="WA">WA</option>
                        <option value="SA">SA</option>
                        <option value="TAS">TAS</option>
                        <option value="ACT">ACT</option>
                    </select>
                    <label for="postcode">Postcode</label>
                    <input type="text" name="postcode" id="postcode" minlength="4" maxlength="4" pattern="[0-9]+" required="required">
                </p>
            </fieldset><br>
            <fieldset>
                <legend>Contact Details</legend>
                <p>
                    <label for="email">Email Address</label>
                    <input type="email" name="email" id="email" pattern="^.+@.+\..{2,3}$" required="required">
                    <label for="phone">Phone Number</label>
                    <input type="text" name="phone" id="phone" pattern="[0-9 ]+" minlength="8" maxlength="12" required="required">
                </p>
            </fieldset><br>
            <fieldset>
                <legend>Skills</legend>
                <div class="checkboxes">
                    <input type="checkbox" name="skills[]" id="html" value="HTML" checked="checked">
                    <label for="html">HTML</label>
                    <input type="checkbox" name="skills[]" id="css" value="CSS">
                    <label for="css">CSS</label>
                    <input type="checkbox" name="skills[]" id="js" value="JavaScript">
                    <label for="js">JavaScript</label>
                    <input type="checkbox" name="skills[]" id="resp_des" value="Responsive Design">
                    <label for="resp_des">Responsive Design</label>
                    <input type="checkbox" name="skills[]" id="sql" value="SQL">
                    <label for="sql">SQL</label>
                    <input type="checkbox" name="skills[]" id="r" value="R">
                    <label for="r">R</label>
                    <input type="checkbox" name="skills[]" id="python" value="Python">
                    <label for="python">Python</label>
                </div>
                <div class="other_skills">
                    <p>
                        <label for="other_skills">Other Skills</label><br>
                        <textarea name="other_skills" id="other_skills" rows="4" cols="30"></textarea>
                    </p>
                </div>
            </fieldset><br>
            <p>
                <input type="submit" value="Submit Application">
                <input type="reset" value="Reset Form">
            </p>
        </form>
    </div>
    <footer>
        <?php include 'footer.inc'; ?>
    </footer>
</body>
</html>