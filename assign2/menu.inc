<ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="jobs.php">Job Information</a></li>
    <li><a href="apply.php">Application</a></li>
    <li><a href="about.php">About Us</a></li>
    <li><a href="contact.php">Contact Us</a></li>
    <?php if (isset($_SESSION['username'])): ?>
        <li><a href="manage.php">Manage Applications</a></li>
        <li><a href="logout.php">Logout</a></li>
    <?php else: ?>
        <li><a href="phpenhancements.php">Manager Login</a></li>
    <?php endif; ?>
</ul>
