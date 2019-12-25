<?php 
session_start();
require_once("../function/connection.php");
$sql="UPDATE members SET password=:password, updated_at=:updated_at WHERE memberID=:memberID";
$sth=$db->prepare($sql);
$sth->bindParam(":password",$_POST['password_new'],PDO::PARAM_STR);
$sth->bindParam(":updated_at",$_POST['updated_at'],PDO::PARAM_STR);
$sth->bindParam(":memberID",$_SESSION['member']['memberID'],PDO::PARAM_STR);
$sth->execute();
$_SESSION['member']['password']=$_POST['password_new'];
header("Location: customer-account.php?MSG=success");

?>