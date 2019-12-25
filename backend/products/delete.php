<?php
require_once('../is_login.php');
require_once("../../function/connection.php");
$query=$db->query("DELETE FROM products WHERE productID=".$_GET["productID"]);
header("Location: list.php?level1_ID=".$_GET['level1_ID']."&name=".$_GET["name"]);
?>