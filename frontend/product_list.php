<?php 
require_once("../function/connection.php");
if (isset($_GET["categoryID"]) && $_GET["categoryID"] != null){
$query = $db ->query("SELECT * FROM products WHERE product_categoryID=".$_GET["categoryID"]." ORDER BY created_at DESC");
$products=$query ->fetchAll(PDO::FETCH_ASSOC);
}else{
$query = $db ->query("SELECT * FROM products ORDER BY created_at DESC");
$products=$query ->fetchAll(PDO::FETCH_ASSOC);
}
?>
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

    <!-- *** NAVBAR END *** -->

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="../index.php">首頁</a>
                        </li>
                        <li><a href="product_list.php">所有產品</a>
                        </li>
                        <li><?php if(isset($_GET["category"]) && $_GET["category"] != null) {echo $_GET["category"];} ?></li>
                    </ul>

                </div>

                <div class="col-md-3">
                    <!-- *** MENUS AND FILTERS ***
 _________________________________________________________ -->
                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">產品分類</h3>
                        </div>

                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked category-menu">
                            <?php foreach ($categories as $class){ 
                                $query2 = $db ->query("SELECT * FROM products WHERE product_categoryID=".$class['product_categoryID']);
                                $allproducts=count($query2 ->fetchAll(PDO::FETCH_ASSOC));
                            ?>
                                <li>
                                    <a href="product_list.php?categoryID=<?php echo $class["product_categoryID"]; ?>&category=<?php echo $class["category"]; ?>"><?php echo $class["category"]; ?> <span class="badge pull-right"><?php echo $allproducts; ?></span></a>
                                    
                                </li>
                            <?php } ?>
                            </ul>

                        </div>
                    </div>

                    
                    

                    <!-- *** MENUS AND FILTERS END *** -->

                    <div class="banner">
                        <a href="#">
                            <img src="../images/ad-banner.jpg" alt="sales 2014" class="img-responsive">
                        </a>
                    </div>
                </div>

                <div class="col-md-9">

                    <div class="row">
                        <div class="col-sm-12">        
                        <?php foreach($products as $one_product){ ?>
                        <div class="col-sm-3">
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="product.php?categoryID=<?php echo $one_product["product_categoryID"]; ?>&productID=<?php echo $one_product["productID"]; ?>">
                                                <img src="../uploads/products/<?php echo $one_product["picture"]; ?>" alt="" class="img-responsive" style="width: 100%;height:121px;object-fit:cover;">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="product.php?categoryID=<?php echo $one_product["product_categoryID"]; ?>&productID=<?php echo $one_product["productID"]; ?>">
                                                <img src="../uploads/products/<?php echo $one_product["picture"]; ?>" alt="" class="img-responsive" style="width: 100%;height:121px;object-fit:cover;">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="product.php?categoryID=<?php echo $one_product["product_categoryID"]; ?>&productID=<?php echo $one_product["productID"]; ?>" class="invisible">
                                    <img src="../uploads/products/<?php echo $one_product["picture"]; ?>" alt="" class="img-responsive" style="width: 100%;height:121px;object-fit:cover;">
                                </a>
                                <div class="text">
                                    <h3><a href="product.php?categoryID=<?php echo $one_product["product_categoryID"]; ?>&productID=<?php echo $one_product["productID"]; ?>"><?php echo $one_product["name"]; ?></a></h3>
                                    <p class="price">$NT <?php echo $one_product["price"]; ?></p>
                                </div>
                                <!-- /.text -->
                                <?php if($one_product["status"] == 1){ ?>
                                    <div class="ribbon new">
                                        <div class="theribbon">NEW</div>
                                        <div class="ribbon-background"></div>
                                    </div>
                                <?php }elseif($one_product["status"] == 2){ ?>
                                <!-- /.ribbon -->
                                    <div class="ribbon sale">
                                        <div class="theribbon">SALE</div>
                                        <div class="ribbon-background"></div>
                                    </div>
                                <?php } ?>
                               
                            </div>
                            <!-- /.product -->
                        </div>
                        <?php } ?>
                   
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