
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
<!-- 資料集 -->
<?php 
$query = $db ->query ("SELECT * FROM products WHERE productID=".$_GET["productID"]) ;
$one_product=$query ->fetch(PDO::FETCH_ASSOC);
$query = $db ->query("SELECT category FROM product_categories JOIN products ON product_categories.product_categoryID=products.product_categoryID WHERE products.productID=".$_GET["productID"]);
$category_name=$query ->fetch(PDO::FETCH_ASSOC);

?>
<!-- 資料集結束 -->

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="../index.php">首頁</a>
                        </li>
                        <li><a href="product_list.php">所有產品</a>
                        </li>
                        <li><a href="product_list.php?categoryID=<?php echo $_GET["categoryID"]; ?>"><?php echo $category_name["category"]; ?></a>
                        </li>
                        <li><?php echo $one_product["name"]; ?></li>
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
                
                    <div class="row" id="productMain">
                        <div class="col-sm-6">
                            <div id="mainImage">
                                <img src="../uploads/products/<?php echo $one_product["picture"]; ?>" alt="" class="img-responsive">
                            </div>

                           
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
                        <div class="col-sm-6">
                            <form action="cart/add_cart.php" method="post">
                                <div class="box">
                                    <h1 class="text-center"><?php echo $one_product["name"]; ?></h1>
                                    <p class="goToDescription"><a href="#details" class="scroll-to">詳細介紹</a>
                                    </p>
                                    <p class="quantity"><input type="number" min="1" value="1" name="quantity" class="form-control"></p>
                                    <p class="price">$NT <?php echo $one_product["price"]; ?></p>
                                    
                                    <p class="text-center buttons">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> 加入購物車</button> 
                                        <!-- <button type="submit" class="btn btn-default"><i class="fa fa-heart"></i> 加入願望清單</button> -->
                                    </p>
                                    <input type="hidden" name="pic" value="<?php echo $one_product["picture"]; ?>">
                                    <input type="hidden" name="product_name" value="<?php echo $one_product["name"]; ?>">
                                    <input type="hidden" name="price" value="<?php echo $one_product["price"]; ?>">
                                    <input type="hidden" name="productID" value="<?php echo $one_product["productID"]; ?>">
                                    <input type="hidden" name="categoryID" value="<?php echo $one_product["product_categoryID"]; ?>">
                                </div>
                            </form>
                            <div class="row" id="thumbs">
                            <?php if (isset($one_product["picture"])&&$one_product["picture"]!=null){ ?>
                                <div class="col-xs-4">
                                    <a href="../uploads/products/<?php echo $one_product["picture"]; ?>" class="thumb">
                                        <img src="../uploads/products/<?php echo $one_product["picture"]; ?>" alt="" class="img-responsive">
                                    </a>
                                </div>
                            <?php } ?>
                            <?php if (isset($one_product["picture1"])&&$one_product["picture1"]!=null){ ?>
                                <div class="col-xs-4">
                                    <a href="../uploads/products/<?php echo $one_product["picture1"]; ?>" class="thumb">
                                        <img src="../uploads/products/<?php echo $one_product["picture1"]; ?>" alt="" class="img-responsive">
                                    </a>
                                </div>
                                <?php } ?>    
                            <?php if (isset($one_product["picture2"])&&$one_product["picture2"]!=null){ ?>
                                <div class="col-xs-4">
                                    <a href="../uploads/products/<?php echo $one_product["picture2"]; ?>" class="thumb">
                                        <img src="../uploads/products/<?php echo $one_product["picture2"]; ?>" alt="" class="img-responsive">
                                    </a>
                                </div>
                            <?php } ?>
                            </div>
                        </div>

                    </div>


                    <div class="box" id="details">
                        <p>
                            <h4>商品介紹</h4>
                            <?php echo $one_product['description']; ?>
                            <blockquote>
                                <p><em>麵包與蛋糕均為當天現做，收到商品後請盡早食用完畢。</em>
                                </p>
                            </blockquote>

                            <hr>
                            <div class="social">
                                <h4>Show it to your friends</h4>
                                <p>
                                    <a href="#" class="external facebook" data-animate-hover="pulse"><i class="fa fa-facebook"></i></a>
                                    <a href="#" class="external gplus" data-animate-hover="pulse"><i class="fa fa-google-plus"></i></a>
                                    <a href="#" class="external twitter" data-animate-hover="pulse"><i class="fa fa-twitter"></i></a>
                                    <a href="#" class="email" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                                </p>
                            </div>
                    </div>

                    

                    

                </div>
                <!-- /.col-md-9 -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


       <?php require_once('template/footer.php'); ?>

<div class="modal fade" id="info-modal" tabindex="-1" role="dialog" aria-labelledby="info" aria-hidden="true">
    <div class="modal-dialog modal-sm">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">訊息</h4>
            </div>
            <div class="modal-body text-center">
                <p class="text-center text-muted changeword">成功更新數量!</p>
                <button type="button" class="btn btn-primary" data-dismiss="modal">確定</button>
            </div>
        </div>
    </div>
</div>      

<!-- 版本一 -->
<?php
//  if(isset($_GET['Existed']) && $_GET['Existed'] != null){
//   if($_GET['Existed'] == 'true'){ ?>
      <script>
    //    $(function(){
    //         $('.modal-body>p').html('此商品已存在購物車，請至「我的購物車」修改數量。');
    //         $('#info-modal').modal();            
    //     });
     </script> 
    <?php // }else{ ?>
     <script>
        // $(function(){
        //     $('.modal-body>p').html('成功加入購物車!');
        //     $('#info-modal').modal();  
        //     // 2秒後視窗自動消失   
        //     setTimeout(function(){
        //         $('#info-modal').modal('hide');
        //     }, 2000);       
        // });
     </script> 
   
<?php // }  
  //  }?>
<!-- 版本一 結束 -->

<?php if(isset($_GET['Existed']) && $_GET["Existed"] == "true"){ ?>
    <script>
    $(function(){
        $(".changeword").html("此商品已存在購物車，請至「我的購物車」修改數量。");
        $("#info-modal").modal();
    });
    </script>
<?php }else if(isset($_GET['Existed']) && $_GET["Existed"] == "false"){ ?>
    <script>
    $(function(){
        $(".changeword").html("成功加入購物車!");
        $("#info-modal").modal();
        setTimeout(function(){
           $("#info-modal").modal("hide");
        }, 2000);
    });
    </script>

<?php } ?>







</body>

</html>