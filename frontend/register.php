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
                        <li>加入會員 / 會員登入</li>
                    </ul>

                </div>

                <div class="col-md-6">
                    <div class="box">
                        <h1>加入會員</h1>

                        <p class="lead">Not our registered customer yet?</p>
                        <p>With registration with us new world of fashion, fantastic discounts and much more opens to you! The whole process will not take you more than a minute!</p>
                        <p class="text-muted">If you have any questions, please feel free to <a href="contact.php">contact us</a>, our customer service center is working for you 24/7.</p>

                        <hr>

                        <form data-toggle="validator" action="register_success.php " method="post">
                            <div class="form-group">
                                <label for="name">姓名</label>
                                <input type="text" class="form-control" id="name" name="name" data-error="請輸入名字" required>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <label for="account">帳號(Email)</label>
                                <input type="email" class="form-control" id="account" data-error="請以Email做為帳號" name="account" required>
                                <div class="help-block with-errors is_repeat"></div>
                            </div>
                            <div class="form-group">
                                <label for="password">密碼</label>
                                <input type="password" data-minlength="6" class="form-control" data-error="請輸入至少6個字元的密碼" id="password" name="password" required>
                                <input type="hidden" name="url" value="<?php echo $_GET['url']; ?>">
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <label for="comfirm_password">確認密碼</label>
                                <input type="password" class="form-control" id="comfirm_password" name="comfirm_password" data-match="#password" data-error="與密碼不符，請檢查" required>
                                
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="text-center">
                            <input type="hidden" name="created_at" value="<?php echo date("Y-m-d H:i:s"); ?>">
                                <button type="submit" id="button1" class="btn btn-primary"><i class="fa fa-user-md"></i> 註冊</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="box">
                        <h1>會員登入</h1>

                        <p class="lead">已經加入會員?</p>
                        <p class="text-muted">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies
                            mi vitae est. Mauris placerat eleifend leo.</p>

                        <hr>

                        <form  data-toggle="validator" action="check_login.php" method="post">
                            <div class="form-group">
                                <label for="login_account">帳號(Email)</label>
                                <input type="email" class="form-control" id="login_account" data-error="請輸入帳號" name="account" required>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <label for="login_password">密碼</label>
                                <input type="password" class="form-control" id="login_password" data-error="請輸入密碼" name="password" required>
                                <input type="hidden" name="url" value="<?php echo $_GET['url']; ?>">
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in"></i> 登入</button>
                            </div>
                        </form>
                    </div>
                </div>


            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->
         	<!-- Modal -->
	 <div class="modal fade" id="pleaselogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">注意</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			請先登入/加入會員。
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">知道了</button>
		</div>
		</div>
	</div>
	</div>
	<!-- Modal END -->


        <?php require_once('template/footer.php'); ?>

<script>
$(function(){
    $("#password").focus(function(){
        $.ajax({
            type:"post",
            url:"check_email.php",
            dataType:"text",
            data:{
            account:$("#account").val(),
            },
            success:function(data){
                if(data == "repeat"){
                    $(".is_repeat").parent().addClass("has-error has-danger");
                    $(".is_repeat").html("此帳號已使用過，請重新輸入");
                }else if(data == "no_repeat"){
                    $(".is_repeat").html("");

                }else if(data == "empty"){
                    $(".is_repeat").html("請輸入email做為帳號");

                }
            }

        });
    });
});

</script>
	<?php  if(isset($_GET["MSG"]) && $_GET['MSG'] == "please_login"){ ?>
	<script>
	$(function(){
		$("#pleaselogin").modal();
	});
	</script>
	<?php } ?>

</body>

</html>
