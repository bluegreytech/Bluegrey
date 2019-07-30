<?php
session_start();
$Email=$_SESSION['UserName'];
if (!isset($_SESSION['UserName'])) {
    header('location:index.php');
}
?>