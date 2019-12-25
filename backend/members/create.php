<?php
require_once('../is_login.php');
require_once("../../function/connection.php");
?>

<?php

if(isset($_POST["AddForm"]) && $_POST["AddForm"] == "INSERT"){
  $sql = "INSERT INTO members (name,gender,account,password,birthday,level,phone,mobile,email,county,district,zipcode,address,created_at) VALUES (:name,:gender,:account,:password,:birthday,:level,:phone,:mobile,:email,:county,:district,:zipcode,:address,:created_at)";
  $sth=$db->prepare($sql);
  $sth->bindparam(":name",$_POST["name"],PDO::PARAM_STR);
  $sth->bindparam(":gender",$_POST["gender"],PDO::PARAM_INT);
  $sth->bindparam(":account",$_POST["account"],PDO::PARAM_STR);
  $sth->bindparam(":password",$_POST["password"],PDO::PARAM_STR);
  $sth->bindparam(":birthday",$_POST["birthday"],PDO::PARAM_STR);
  $sth->bindparam(":level",$_POST["level"],PDO::PARAM_INT);
  $sth->bindparam(":phone",$_POST["phone"],PDO::PARAM_STR);
  $sth->bindparam(":mobile",$_POST["mobile"],PDO::PARAM_STR);
  $sth->bindparam(":email",$_POST["email"],PDO::PARAM_STR);
  $sth->bindparam(":county",$_POST["county"],PDO::PARAM_STR);
  $sth->bindparam(":district",$_POST["district"],PDO::PARAM_STR);
  $sth->bindparam(":zipcode",$_POST["zipcode"],PDO::PARAM_STR);
  $sth->bindparam(":address",$_POST["address"],PDO::PARAM_STR);
  $sth->bindparam(":created_at",$_POST["created_at"],PDO::PARAM_STR);
  $sth->execute();

  header("Location: list.php");
}


?>

<!DOCTYPE html>
<html>

<head>
  <?php include_once("../layouts/head.php"); ?>
</head>

<body>
  <?php include_once("../layouts/nav.php"); ?>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="">會員管理</h1>
          <ul class="breadcrumb">
            <li class="breadcrumb-item"> <a href="#"><i class="fa fa-home"></i> 主控台</a> </li>
            <li class="breadcrumb-item active"><a href="list.php">會員管理</a></li>
            <li class="breadcrumb-item active">新增一筆</li>
          </ul>
          <form id="news_create" class="text-right" method="post" action="create.php">
            <div class="form-group row"> <label for="inputmailh" class="col-3 col-form-label">姓名</label>
              <div class="col-9">
                <input type="text" class="form-control-file" id="inputmailh" name="name"> </div>
            </div>
            <div class="form-group row">
              <div class="col-3">性別</div>
              <div class="col-9 text-left">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="gender" id="male" value="1">
                  <label class="form-check-label" for="male">男</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="gender" id="female" value="0">
                  <label class="form-check-label" for="female">女</label>
                </div>
              </div>
            </div>
            <div class="form-group row"> <label for="published_at" class="col-3 col-form-label">帳號</label>
              <div class="col-9">
                <input type="text" class="form-control" id="published_at" name="account"> </div>
            </div>
            <div class="form-group row"> <label for="password" class="col-3 col-form-label">密碼</label>
              <div class="col-9">
                <input type="text" class="form-control" id="password" name="password"> </div>
            </div>
            <div class="form-group row"> <label for="birthday" class="col-3 col-form-label">生日</label>
              <div class="col-9">
                <input type="text" class="form-control" id="birthday" name="birthday"> </div>
            </div>
            <div class="form-group row"> <label for="inputpasswordh" class="col-3 col-form-label">會員等級</label>
              <div class="col-9">
                <input type="text" class="form-control" id="inputpasswordh" name="level"> </div>
            </div>
            <div class="form-group row"> <label for="phone" class="col-3 col-form-label">通訊電話</label>
              <div class="col-9">
                <input type="text" class="form-control" id="phone" name="phone"> </div>
            </div>
            <div class="form-group row"> <label for="mobile" class="col-3 col-form-label">行動電話</label>
              <div class="col-9">
                <input type="text" class="form-control" id="mobile" name="mobile"> </div>
            </div>
            <div class="form-group row"> <label for="inputpassword" class="col-3 col-form-label">電子信箱</label>
              <div class="col-9">
                <input type="text" class="form-control" id="inputpassword" name="email"> </div>
            </div>

            <div id="twzipcode" class="row">
              <label for="zipcode" class="col-sm-3 col-3 form-group col-form-label">郵遞區號</label>
              <div class="col-sm-1 col-9 form-group">
                <input type="text" class="form-control" id="zipcode" name="zipcode">
              </div>
              <label for="county" class="col-sm-1 col-3 form-group col-form-label">城市</label>
              <div class="col-sm-3 col-9 form-group">
                <select class="form-control" id="county" name="county"></select>
              </div>
              <label for="district" class="col-sm-1 col-3 form-group col-form-label">地區</label>
              <div class="col-sm-3 col-9 form-group">
                <select class="form-control" id="district" name="district"></select>
              </div>
            </div>

            <div class="form-group row"> <label for="address" class="col-3 col-form-label">通訊地址</label>
              <div class="col-9">
                <input type="text" class="form-control" id="address" name="address"> </div>
            </div>
            <a class="btn btn-outline-primary" href="javascript:alert('確定要離開');history.go(-1);">回上一頁</a>
            <button type="submit" class="btn btn-primary">確認</button>
            <input type="hidden" name="created_at" value="<?php echo date("Y-m-d H:i:s");?>">
            <input type="hidden" name="AddForm" value="INSERT">
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php include_once("../layouts/footer.php"); ?>
  <script src="../../js/jquery.twzipcode.min.js"></script>
  <script>
$(function(){
  $( "#birthday" ).datepicker({
    changeYear:true,
    changeMonth:true,
    dateFormat:"yy-mm-dd",      //中間用,(逗號)分開
    yearRange:"1930:2001",
  });
});
$(function(){
  $("#twzipcode").twzipcode();
  $("#twzipcode").find("input[name='zipcode']").eq(1).remove();
  $("#twzipcode").find("select[name='county']").eq(1).remove();
  $("#twzipcode").find("select[name='district']").eq(1).remove();
});
</script>
</body>

</html>