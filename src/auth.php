<?php
session_start();

function checkRole($allowedRoles = []) {
    if (!isset($_SESSION['role']) || !in_array($_SESSION['role'], $allowedRoles)) {
     
        exit;
    }
}
?>