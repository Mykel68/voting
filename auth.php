<?php
session_start();

// Check if the user is logged in as an admin
function isAdmin() {
    return isset($_SESSION['userType']) && $_SESSION['userType'] === 'admin';
}

// Redirect to login page if not logged in
function checkLogin() {
    if (!isset($_SESSION['userId'])) {
        header("location: login.php");
        exit;
    }
}

// Redirect regular users from admin pages
function restrictRegularUsers() {
    if (!isAdmin()) {
        echo "Access denied. You are not authorized to view this page.";
        exit;
    }
}

// Check login status on all admin pages
checkLogin();
?>
