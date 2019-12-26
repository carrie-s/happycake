<?php require_once("is_login.php");?>
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
    <link rel="stylesheet" href="../js/jquery-ui/jquery-ui.min.css">
    <?php require_once('template/head_files.php'); ?>


</head>

<body>
<?php require_once('template/navbar.php'); ?>

<?php
$query2=$db->query("SELECT * FROM customer_orders WHERE customer_orderID=".$_GET['customer_orderID']);
$order=$query2->fetch(PDO::FETCH_ASSOC);
$query=$db->query("SELECT * FROM order_details WHERE customer_orderID=".$_GET['customer_orderID']);
$order_details=$query->fetchAll(PDO::FETCH_ASSOC);
?>
    <!-- *** NAVBAR END *** -->

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">

                    <ul class="breadcrumb">
                        <li><a href="../index.php">首頁</a>
                        </li>
                        <li>會員專區</li>
                        <li><a href="customer-orders.php">我的訂單</a>
                        </li>
                        <li>訂單編號 # <?php echo $_GET['no'];?></li>
                    </ul>

                </div>

                <div class="col-md-3">
                    <!-- *** CUSTOMER MENU ***
 _________________________________________________________ -->
                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                        <h3 class="panel-title">會員專區</h3>
                        </div>

                        <div class="panel-body">

                            <ul class="nav nav-pills nav-stacked">
                            <li>
                                    <a href="customer-account.php"><i class="fa fa-user"></i> 我的資料</a>
                                </li>
                                <li>
                                    <a href="basket.php"><i class="fa fa-shopping-cart"></i> 我的購物車</a>
                                </li>
                                <li class="active" >
                                    <a href="customer-orders.php"><i class="fa fa-list"></i> 我的訂單</a>
                                </li>
                                <li>
                                    <a href="logout.php"><i class="fa fa-sign-out"></i> 登出</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <!-- /.col-md-3 -->

                    <!-- *** CUSTOMER MENU END *** -->
                </div>

                <div class="col-md-9" id="customer-order">
                    <div class="box">
                        <h2>訂單 # <?php echo $_GET['no'];?></h2>
                        <p class="lead">此訂單於<strong><?php echo $order['order_date'];?></strong>訂購，目前狀態為：
                            <?php if ($order['status']==0){ ?>
                            <td><strong class="label label-info">待付款</strong>
                            <?php }elseif($order['status']==1){ ?>
                            <strong class="label label-success">交易完成</strong>
                            <?php }elseif($order['status']==2){ ?>
                            <strong class="label label-danger">運送中</strong>
                            <?php }elseif($order['status']==3){ ?>
                            <strong class="label label-warning">出貨中</strong>
                            <?php }elseif($order['status']==99){ ?>
                            <strong class="label label-warning">取消訂單</strong>
                            <?php } ?>.</p>
                        <p class="text-muted">若有任何問題請至 <a href="contact.php">聯絡我們</a>填寫表單.</p>
                        <a href="customer-orders.php" class="btn btn-primary btn-sm">回訂單列表</a>        
                        <hr>

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>產品圖片</th>
                                        <th>產品名稱</th>
                                        <th>數量</th>
                                        <th>單價</th>
                                        <th>小計</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $total_price=0; ?>
                    
                                    <?php foreach($order_details as $order_detail){?>
                                        
                                        
                                    
                                    <tr>
                                        <td>
                                                <img src="../uploads/products/<?php echo $order_detail['picture'];?>" alt="<?php echo $order_detail['name'];?>">
                                        </td>
                                        <td><?php echo $order_detail['name'];?>
                                        </td>
                                        <td><?php echo $order_detail['quantity'];?></td>
                                        <td>$NT <?php echo $order_detail['price'];?></td>
                                        <td>$NT <?php $sub_total=$order_detail['quantity']*$order_detail['price']; echo $sub_total ;?></td>
                                    </tr>
                                    <?php $total_price+= $sub_total; ?>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="4" class="text-right">總金額(未含運)</th>
                                        <th>$NT <?php echo $total_price;?></th>
                                    </tr>
                                    <tr>
                                        <th colspan="4" class="text-right">運費</th>
                                        <th>$NT <?php echo $order['shipping'];?></th>
                                    </tr>
                                    <tr>
                                        <th colspan="4" class="text-right">總金額</th>
                                        <th>$NT <?php echo $total_price+$order['shipping'];?></th>
                                    </tr>
                                </tfoot>
                            </table>

                        </div>
                        <!-- /.table-responsive -->
                        <table class="table table-hover">
                        <h2>收件人資料</h2>
                            <thead>
                                <tr>
                                <th>姓名</th>
                                <th>聯絡電話</th>
                                <th>收件地址</th>
                                <th>運送方式</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><?php echo $order['name'];?></td>
                                <td><?php echo $order['phone'];?></td>
                                <td><?php echo $order['address'];?></td>
                                <td><?php echo $order['receive_method'];?></td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- <div class="row addresses">
                            <div class="col-md-6">
                                <h2>收件地址</h2>
                                <p>姓名
                                    <br>聯絡電話
                                    <br>收件地址
                                    <br>訂購日期
                                    <br>運送方式
                                    <br>Great Britain</p>
                            </div>
                            <div class="col-md-11">
                                <h2>收件地址</h2>
                                <p>
                                    <br>
                                    <br>
                                    <br>
                                    <br></p>
                            </div>
                        </div> -->

                    </div>
                </div>

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->

 <?php require_once('template/footer.php'); ?>



</body>

</html>
