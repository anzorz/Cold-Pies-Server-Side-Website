<?php
session_start();
session_destroy();
header("Location: phpenhancements.php");
exit();
?>
