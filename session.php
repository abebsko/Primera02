<?php
session_start();
if(!isset($_SESSION['id']) || (trim($_SESSION['id']) == "")){
    header("location: login.php");
    exit();
}
$id=$_SESSION['id'];
?>