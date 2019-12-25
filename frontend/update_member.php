<?php
session_start();
require_once("../function/connection.php");
if(isset($_POST['EditForm']) && $_POST['EditForm'] == "UPDATE"){
    $sql="UPDATE members SET name=:name, birthday=:birthday, gender=:gender, zipcode=:zipcode, county=:county, district=:district, address=:address, phone=:phone, mobile=:mobile, email=:email, updated_at=:updated_at WHERE memberID=".$_SESSION['member']['memberID'];
    $sth=$db->prepare($sql);
    $sth->bindParam(":name",$_POST['name'],PDO::PARAM_STR);
    $sth->bindParam(":birthday",$_POST['birthday'],PDO::PARAM_STR);
    $sth->bindParam(":gender",$_POST['gender'],PDO::PARAM_STR);
    $sth->bindParam(":zipcode",$_POST['zipcode'],PDO::PARAM_STR);
    $sth->bindParam(":county",$_POST['county'],PDO::PARAM_STR);
    $sth->bindParam(":district",$_POST['district'],PDO::PARAM_STR);
    $sth->bindParam(":address",$_POST['address'],PDO::PARAM_STR);
    $sth->bindParam(":phone",$_POST['phone'],PDO::PARAM_STR);
    $sth->bindParam(":mobile",$_POST['mobile'],PDO::PARAM_STR);
    $sth->bindParam(":email",$_POST['email'],PDO::PARAM_STR);
    $sth->bindParam(":updated_at",$_POST['updated_at'],PDO::PARAM_STR);
    $sth->execute();
    $_SESSION['member']['name'] = $_POST['name'];
    $_SESSION['member']['birthday'] = $_POST['birthday'];
    $_SESSION['member']['gender'] = $_POST['gender'];
    $_SESSION['member']['zipcode'] = $_POST['zipcode'];
    $_SESSION['member']['county'] = $_POST['county'];
    $_SESSION['member']['district'] = $_POST['district'];
    $_SESSION['member']['address'] = $_POST['address'];
    $_SESSION['member']['phone'] = $_POST['phone'];
    $_SESSION['member']['mobile'] = $_POST['mobile'];
    $_SESSION['member']['email'] = $_POST['email'];
    $_SESSION['member']['updated_at'] = $_POST['updated_at'];
    header("Location: customer-account.php?MSG=success");
}

?>