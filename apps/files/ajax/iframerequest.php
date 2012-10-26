<?php 

session_start();
if(isset($_GET['requesttoken'])) $_SESSION['IFRAME_REQUESTTOKEN']=$_GET['requesttoken'];
?>