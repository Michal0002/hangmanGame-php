<?php
session_start();

if ($_SESSION['role'] !== 'admin') {
    header('HTTP/1.1 403 Forbidden');
    die('Access denied');
}
?>