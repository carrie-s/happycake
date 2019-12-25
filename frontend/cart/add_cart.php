<?php
session_start();
$is_existed="false";

if(isset($_SESSION["cart"]) && $_SESSION["cart"] != null){
    for($i=0; $i< count($_SESSION["cart"]); $i++ ){
        if($_POST["productID"] == $_SESSION["cart"][$i]["productID"]){
            $is_existed="true";
            goto_previousPage($is_existed);
        }
    }
}


if($is_existed =="false"){
    $temp["pic"] = $_POST["pic"];
    $temp["product_name"] = $_POST["product_name"];
    $temp["price"] = $_POST["price"];
    $temp["productID"] = $_POST["productID"];
    $temp["quantity"] = $_POST["quantity"];
    $temp["categoryID"] = $_POST["categoryID"];
    $_SESSION["cart"][] = $temp;
    goto_previousPage($is_existed);
}
function goto_previousPage($is_existed){
    $location=$_SERVER["HTTP_REFERER"];
    $location.="&Existed=".$is_existed;
    header(sprintf('Location: %s ', $location));
}
?>