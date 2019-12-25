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
<?php require_once("is_login.php");?>
    <!-- *** NAVBAR END *** -->

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">

                    <ul class="breadcrumb">
                        <li><a href="../index.php">首頁</a>
                        </li>
                        <li>會員專區</li>
                        <li>會員資料</li>
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
                                <li class="active">
                                    <a href="customer-account.php"><i class="fa fa-user"></i> 我的資料</a>
                                </li>
                                <li>
                                    <a href="basket.php"><i class="fa fa-shopping-cart"></i> 我的購物車</a>
                                </li>
                                <li >
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

                <div class="col-md-9">
                    <div class="box">
                        <h1>會員基本資料</h1>
                        <p class="lead">編輯您的會員資料</p>
                        <p class="text-muted">此資料協助我們寄送產品與提供更多優惠訊息，請務必填寫真實資料</p>
                        <?php if(isset($_GET['MSG']) && $_GET['MSG'] != null){ ?>
                        <div class="alert alert-success">
                            <strong>更新成功!</strong>
                        </div>
                        <?php } ?>
                        <h3>變更密碼</h3>

                        <form data-toggle="validator" action="change_password.php" method="post">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="password_old">舊密碼</label>
                                        <input type="password" class="form-control" data-match="#password_hidden" data-error="密碼錯誤" id="password_old" name="password_old">
                                        <input type="hidden" class="form-control" id="password_hidden" name="password_hidden" value="<?php echo $_SESSION['member']['password']; ?>">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="password_1">新密碼</label>
                                        <input type="password" data-minlength="6" class="form-control" data-error="至少輸入六個字元" id="password_new" name="password_new">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="password_2">再次輸入新密碼</label>
                                        <input type="password" class="form-control" data-match="#password_new" data-error="與新密碼不符，請檢查" id="password_check" name="password_check">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->
                            <input type="hidden" class="form-control"  name="updated_at" value="<?php echo date("Y-m-d H:i:s") ?>">    
                            <div class="col-sm-12 text-center">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> 修改密碼</button>
                            </div>
                        </form>

                        <hr>

                        <h3>個人資料</h3>
                        <form action="update_member.php" method="post">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="firstname">姓名</label>
                                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $_SESSION['member']['name']; ?>">
                                    </div>
                                </div>

                            </div>
                            <!-- /.row -->

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="company">生日</label>
                                        <input type="text" class="form-control" id="birthday" name="birthday" value="<?php echo $_SESSION['member']['birthday']; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="street">性別</label>
                                        <div class="form-control" style="border:none;">
                                            <label class="radio-inline"><input type="radio" name="gender" value="1" >男</label>
                                            <label class="radio-inline"><input type="radio" name="gender" value="0" >女</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->

                            <div class="row">
                                <div id="twzipcode">
                                    <div class="col-sm-6 col-md-3">
                                        <div class="form-group">
                                            <label for="zipcode">郵遞區號</label>
                                            <input type="text" class="form-control" id="zipcode" name="zipcode" value="<?php echo $_SESSION['member']['zipcode']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-3">
                                        <div class="form-group">
                                            <label for="county">城市</label>
                                            <select class="form-control" id="county" name="county">
                                                <option value="<?php echo $_SESSION['member']['county']; ?>"></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-3">
                                        <div class="form-group">
                                            <label for="district">地區</label>
                                            <select class="form-control" id="district" name="district">
                                            <option value="<?php echo $_SESSION['member']['district']; ?>"></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label for="city">地址</label>
                                        <input type="text" class="form-control" id="address" name="address" value="<?php echo $_SESSION['member']['address']; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="phone">家用電話</label>
                                        <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $_SESSION['member']['phone']; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="phone">行動電話</label>
                                        <input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo $_SESSION['member']['mobile']; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email">備用Email</label>
                                        <input type="text" class="form-control" id="email" name="email" value="<?php echo $_SESSION['member']['email']; ?>">
                                    </div>
                                </div>
                                
                                
                                <div class="col-sm-12 text-center">
                                    <input type="hidden" name="updated_at" value="<?php echo date("Y-m-d H:i:s") ?>">
                                    <input type="hidden" name="EditForm" value="UPDATE">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> 更新資料</button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


        <?php require_once('template/footer.php'); ?>
        <script>
        $(function(){
            $("#twzipcode").twzipcode({
                'zipcodeSel'  : '<?php echo $_SESSION["member"]["zipcode"] ?>',     // 此參數會優先於 countySel, districtSel
                'countySel'   : '<?php echo $_SESSION["member"]["county"] ?>',
                'districtSel' : '<?php echo $_SESSION["member"]["district"] ?>'
            });
            $("#twzipcode").find("input[name='zipcode']").eq(1).remove();
            $("#twzipcode").find("select[name='county']").eq(1).remove();
            $("#twzipcode").find("select[name='district']").eq(1).remove();
        });
        $(function(){
            $("#birthday").datepicker({
                dateFormat:"yy-mm-dd",
                changeYear:true,
                changeMonth:true,
                yearRange:"1930:2001",
            });
        });
        <?php if(isset($_SESSION["member"]["gender"]) && $_SESSION["member"]["gender"] != null){ ?>
        <?php if($_SESSION["member"]["gender"] == "0"){ ?>
            $(function(){
            $("input[name='gender'][value='0']").attr("checked", true);
            });
        <?php } else if($_SESSION["member"]["gender"] == "1") { ?>
            $(function(){
            $("input[name='gender'][value='1']").attr("checked", true);
            });
        <?php } ?>
        <?php } ?>
        </script>
       

</body>

</html>
