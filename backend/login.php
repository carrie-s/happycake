<?php
// session_start();
// unset($_SESSION["user"]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Happy Cake 後台登入</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/theme.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Happy Cake 後台登入
				</span>
				<form class="login100-form validate-form p-b-33 p-t-5" method="post" action="login_check.php">

					<div class="wrap-input100 validate-input" data-validate = "請輸入帳號">
						<input class="input100" type="text" name="account" placeholder="帳號">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="請輸入密碼">
						<input class="input100" type="password" name="password" placeholder="密碼">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>
					<?php if (isset($_GET["MSG"]) && $_GET["MSG"] == "error"){?>
					<div class="alert alert-warning" role="alert">
					<i class="fa fa-exclamation-triangle" ></i><strong>登入失敗，請重新輸入帳號密碼！</strong>
					</div>
					<?php } ?>
					<div class="container-login100-form-btn m-t-32">
						<button class="login100-form-btn">
							登入
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">訊息</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			登出成功
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">知道了</button>
		</div>
		</div>
	</div>
	</div>
	<!-- Modal END -->
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
			您尚未登入系統，無法使用該功能，如欲使用該功能，請先登入。
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">知道了</button>
		</div>
		</div>
	</div>
	</div>
	<!-- Modal END -->


	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<!-- <script src="vendor/jquery/jquery-3.2.1.min.js"></script> -->
<!--===============================================================================================-->
	<!-- <script src="vendor/animsition/js/animsition.min.js"></script> -->
<!--===============================================================================================-->
	<!-- <script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script> -->
<!--===============================================================================================-->
	<!-- <script src="vendor/select2/select2.min.js"></script> -->
<!--===============================================================================================-->
	<!-- <script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script> -->
<!--===============================================================================================-->
	<!-- <script src="vendor/countdowntime/countdowntime.js"></script> -->
<!--===============================================================================================-->
	<script src="../js/jquery-ui/jquery.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="../js/jquery-ui/jquery-ui.min.js"></script>
	<script src="js/main.js"></script>

	<?php  if(isset($_GET["MSG"]) && $_GET['MSG'] == "success"){ ?>
	<script>
	$(function(){
		$("#logout").modal();
	});
	</script>
	<?php } ?>
	<?php  if(isset($_GET["MSG"]) && $_GET['MSG'] == "please_login"){ ?>
	<script>
	$(function(){
		$("#pleaselogin").modal();
	});
	</script>
	<?php } ?>

</body>
</html>