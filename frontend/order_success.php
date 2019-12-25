
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Cake House 帶給你最天然健康的幸福滋味">
    <meta name="author" content="Ondrej Svestka | ondrejsvestka.cz">
    <meta name="keywords" content="">

    <title>
        Cake House : 帶給你最天然健康的幸福滋味
    </title>

    <meta name="keywords" content="">

    <?php require_once('template/head_files.php'); ?>



</head>

<body>

<?php require_once('template/navbar.php'); ?>
<?php require_once("is_login.php");?>
<?php
if($_SESSION['order']['delivery'] == 100){
    $receive_method ="宅配";
}elseif($_SESSION['order']['delivery'] == 150){
    $receive_method ="超商取貨付款";
}else{
    $receive_method ="貨到付款";
}
$sql="INSERT INTO customer_orders (memberID, status, order_no, order_date, name, phone, address, total, shipping, pay_method, receive_method, created_at) VALUES (:memberID, :status, :order_no, :order_date, :name, :phone, :address, :total, :shipping, :pay_method, :receive_method, :created_at)";
$sth = $db ->prepare($sql);
$sth ->bindparam(":memberID",$_SESSION['member']['memberID'],PDO::PARAM_INT);
$sth ->bindparam(":status",$_POST['status'],PDO::PARAM_INT);
$sth ->bindparam(":order_no",$_POST['order_no'],PDO::PARAM_STR);
$sth ->bindparam(":order_date",$_POST['order_date'],PDO::PARAM_STR);
$sth ->bindparam(":name",$_SESSION['order']['name'],PDO::PARAM_STR);
$sth ->bindparam(":phone",$_SESSION['order']['phone'],PDO::PARAM_STR);
$sth ->bindparam(":address",$_SESSION['order']['address'],PDO::PARAM_STR);
$sth ->bindparam(":total",$_SESSION['order']['sub_total'],PDO::PARAM_STR);
$sth ->bindparam(":shipping",$_SESSION['order']['delivery'],PDO::PARAM_STR);
$sth ->bindparam(":pay_method",$_SESSION['order']['payment'],PDO::PARAM_STR);
$sth ->bindparam(":receive_method",$receive_method,PDO::PARAM_STR);
$sth ->bindparam(":created_at",$_POST['created_at'],PDO::PARAM_STR);
$sth->execute();

$query=$db->query("SELECT * FROM customer_orders ORDER BY created_at DESC");
$latest=$query->fetch(PDO::FETCH_ASSOC);

for($i=0; $i<count($_SESSION['cart']); $i++){
$sql2="INSERT INTO order_details (customer_orderID, productID, picture, name, price, quantity, created_at) VALUES (:customer_orderID, :productID, :picture, :name, :price, :quantity, :created_at)";
$sth2 = $db ->prepare($sql2);
$sth2 ->bindparam(":customer_orderID",$latest['customer_orderID'],PDO::PARAM_INT);
$sth2 ->bindparam(":productID",$_SESSION['cart'][$i]['productID'],PDO::PARAM_INT);
$sth2 ->bindparam(":picture",$_SESSION['cart'][$i]['pic'],PDO::PARAM_STR);
$sth2 ->bindparam(":name",$_SESSION['cart'][$i]['product_name'],PDO::PARAM_STR);
$sth2 ->bindparam(":price",$_SESSION['cart'][$i]['price'],PDO::PARAM_STR);
$sth2 ->bindparam(":quantity",$_SESSION['cart'][$i]['quantity'],PDO::PARAM_STR);
$sth2 ->bindparam(":created_at",$latest['created_at'],PDO::PARAM_STR);
$sth2->execute();

}
unset($_SESSION['cart']);

?>
    <!-- *** NAVBAR END *** -->

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">

                    <ul class="breadcrumb">
                        <li><a href="#">首頁</a>
                        </li>
                        <li>我的購物車</li>
                        <li>結帳成功</li>
                    </ul>


                    <div class="row" id="error-page">
                        <div class="col-sm-6 col-sm-offset-3">
                            <div class="box">

                                <p class="text-center">
                                    <img src="../images/logo.png" alt="Cake House template">
                                </p>
                              
                                <h3>結帳成功</h3>
                                
                                <p class="text-center">您已成功完成購物，您可前往<a href="customer-orders.php">我的訂單</a>查詢出貨進度或<a href="product_list.php?category_id=1">繼續購物</a></p>
                             
                            </div>
                        </div>
                    </div>


                </div>
                <!-- /.col-md-9 -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


        <?php require_once('template/footer.php'); ?>



</body>

</html>