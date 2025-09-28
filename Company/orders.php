<?php
session_start();
include('nav.php');
include_once "../db.php"; // Ensure your database connection is included

// Check if the user is logged in
if (!isset($_SESSION['COMPANY_LOGGED_IN'])) {
    // Redirect to login page if not logged in
    header('Location: login.php');
    exit(); // Ensure no further code is executed after the redirect
}
?>