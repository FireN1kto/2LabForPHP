<?php
session_start();

function isClientLoggedIn() {
    return isset($_SESSION['client_id']);
}

function isStaffLoggedIn() {
    return isset($_SESSION['staff_id']);
}

function requireClientLogin() {
    if (!isClientLoggedIn()) {
        header('Location: /client/login.php');
        exit();
    }
}

function requireStaffLogin() {
    if (!isStaffLoggedIn()) {
        header('Location: /staff/login.php');
        exit();
    }
}