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
                        <li><a href="#">首頁</a>
                        </li>
                        <li>FAQ</li>
                    </ul>

                </div>

                <div class="col-md-3">
                    <!-- *** PAGES MENU ***
 _________________________________________________________ -->
                    <div class="panel panel-default sidebar-menu">

                    <div class="panel-heading">
                        <h3 class="panel-title">聯絡我們</h3>
                    </div>

                    <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked">
                            <li>
                                <a href="contact.php">聯絡我們</a>
                            </li>
                            <li>
                                <a href="faq.php">常見問題</a>
                            </li>

                        </ul>

                    </div>
                    </div>

                    <!-- *** PAGES MENU END *** -->


                    <div class="banner">
                        <a href="#">
                            <img src="../images/ad-banner.jpg" alt="sales 2014" class="img-responsive">
                        </a>
                    </div>
                </div>

                <div class="col-md-9">


                    <div class="box" id="contact">
                        <h1>常見問題</h1>

                        <p class="lead">如對我們產品有任何問題或想進一步了解，歡迎與我們聯絡</p>
                        <p>我們的客服人員將會迅速為您服務</p>

                        <hr>

                        <div class="panel-group" id="accordion">

                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h4 class="panel-title">

					    <a data-toggle="collapse" data-parent="#accordion" href="#faq1">

						1. 尚未收到商品，該怎麼辦?

					    </a>

					</h4>
                                </div>
                                <div id="faq1" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>您可至我的訂單查詢您的包裹號碼，即可查看網上追蹤包裹的結果。如果顯示包裹已寄送，但您尚未收到包裹。您應首先進行：</p>
                                        <ul>
                                            <li>查看是否家人已在您的住址為您簽收包裹</li>
                                            <li>查看是否包裹可能已被存放在您住所的安全地點</li>
                                            <li>查看是否有收到取件通知單。如果您未能在家收取包裹，快遞業者會留下通知單說明其聯絡方式，讓您可自行安排重新寄送</li>
                                        </ul>
                                        <p>如果您無法找到包裹，請告訴我們，我們將為您提供協助。</p>
                                    </div>
                                </div>
                            </div>
                            <!-- /.panel -->

                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h4 class="panel-title">

					    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">

						2. 運費怎麼算?

					    </a>

					</h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>我們有三種配送方式，分別為：宅配、超商取貨付款，以及貨到付款。運費計算方式分別為：</p>
                                        <ul>
                                            <li>宅配-$NT100</li>
                                            <li>超商取貨付款-$NT150</li>
                                            <li>貨到付款-$NT200</li>
                                        </ul>
                                        <p>購物消費滿2000元，即免運費。</p>


                                    </div>
                                </div>
                            </div>
                            <!-- /.panel -->


                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h4 class="panel-title">

					    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">

						3. 有寄送到海外的服務嗎?

					    </a>

					</h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>我們的商品皆為當天手工現做，為確保商品品質，我們目前沒有寄送海外的服務。
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- /.panel -->

                        </div>
                        <!-- /.panel-group -->


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
