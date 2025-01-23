<?php
session_start();

// Unset all session variables
session_unset();

// Destroy the session
session_destroy();

// Redirect to login page
//header('Location: ../admin_site_views/login.php');
exit;
?>