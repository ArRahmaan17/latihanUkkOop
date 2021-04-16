<?php 
include 'config.php';
include 'masyarakatConfig.php';
$logoutMasyarakat = new Masyarakat();

$logoutMasyarakat->logout();

header("location:index.php");
exit;
 ?>