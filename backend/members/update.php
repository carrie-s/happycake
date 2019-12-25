<?php
require_once('../is_login.php');
require_once("../../function/connection.php");

if(isset($_POST["EditForm"]) && $_POST["EditForm"] == "UPDATE"){
  // 圖片上傳用
  // if(!file_exists('../../uploads/members')){
  //   mkdir('../../uploads/members',0755,true);
  // }
  
  // if(isset($_FILES["picture"]["name"]) && $_FILES["picture"]["name"] != null){
  //   $filename=$_FILES['picture']['name'];
  //   $file_path="../../uploads/members/".$_FILES['picture']['name'];
  //   move_uploaded_file($_FILES["picture"]["tmp_name"],$file_path);
  //  }else{
  //   $filename=$_POST["old_picture"];
  //  }
  $sql = "UPDATE members SET name=:name, gender=:gender, account=:account, password=:password, birthday=:birthday, level=:level, phone=:phone, mobile=:mobile, email=:email, county=:county, district=:district, zipcode=:zipcode, address=:address, created_at=:created_at WHERE memberID=:memberID";
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
  $sth->bindparam(":memberID",$_POST["memberID"],PDO::PARAM_STR);
  $sth->execute();

  header("Location: list.php");
 }else{
  $query=$db->query("SELECT * FROM members WHERE memberID=".$_GET["memberID"]);
  $one_members=$query->fetch(PDO::FETCH_ASSOC);
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
            <li class="breadcrumb-item active">編輯會員資料</li>
          </ul>
          <form id="news_create" class="text-right" method="post" action="update.php">
            <div class="form-group row"> <label for="inputmailh" class="col-3 col-form-label">姓名</label>
              <div class="col-9">
                <input type="text" class="form-control" id="inputmailh" name="name" value="<?php echo $one_members['name'] ?>"> </div>
            </div>
            <div class="form-group row">
              <div class="col-3">性別</div>
              <div class="col-9 text-left">
                <div class="form-check form-check-inline">
                  <input class="form-check-input checked" type="radio" name="gender" id="male" value="1">
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
                <input type="text" class="form-control-plaintext" readonly id="published_at" name="account" value="<?php echo $one_members['account'] ?>"> </div>
            </div>
            <div class="form-group row"> <label for="password" class="col-3 col-form-label">密碼</label>
              <div class="col-9">
                <input type="text" class="form-control" id="password" name="password" value="<?php echo $one_members['password'] ?>"> </div>
            </div>
            <div class="form-group row"> <label for="birthday" class="col-3 col-form-label">生日</label>
              <div class="col-9">
                <input type="text" class="form-control" id="birthday" name="birthday" value="<?php echo $one_members['birthday'] ?>"> </div>
            </div>
            <div class="form-group row"> <label for="inputpasswordh" class="col-3 col-form-label">會員等級</label>
              <div class="col-9">
                <input type="text" class="form-control" id="inputpasswordh" name="level" value="<?php echo $one_members['level'] ?>"> </div>
            </div>
            <div class="form-group row"> <label for="phone" class="col-3 col-form-label">通訊電話</label>
              <div class="col-9">
                <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $one_members['phone'] ?>"> </div>
            </div>
            <div class="form-group row"> <label for="mobile" class="col-3 col-form-label">行動電話</label>
              <div class="col-9">
                <input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo $one_members['mobile'] ?>"> </div>
            </div>
            <div class="form-group row"> <label for="inputpassword" class="col-3 col-form-label">電子信箱</label>
              <div class="col-9">
                <input type="text" class="form-control" id="inputpassword" name="email" value="<?php echo $one_members['email'] ?>"> </div>
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

            <div class="form-group row"> <label for="address" class="col-3 col-form-label" >通訊地址</label>
              <div class="col-9">
                <input type="text" class="form-control" id="address" name="address" value="<?php echo $one_members['address'] ?>"> </div>
            </div>
            <a class="btn btn-outline-primary" href="javascript:alert('確定要離開');history.go(-1);">回上一頁</a>
            <button type="submit" class="btn btn-primary">確認</button>
            <input type="hidden" name="created_at" value="<?php echo date("Y-m-d H:i:s");?>">
            <input type="hidden" name="EditForm" value="UPDATE">
            <input type="hidden" name="memberID" value="<?php echo $_GET['memberID'];?>"> 
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
  $("#twzipcode").twzipcode({
    'zipcodeSel'  : '<?php echo $one_members['zipcode'] ?>',     // 此參數會優先於 countySel, districtSel
    'countySel'   : '<?php echo $one_members['county'] ?>',
    'districtSel' : '<?php echo $one_members['district'] ?>'
            });
  $("#twzipcode").find("input[name='zipcode']").eq(1).remove();
  $("#twzipcode").find("select[name='county']").eq(1).remove();
  $("#twzipcode").find("select[name='district']").eq(1).remove();
});
tinymce.init({
  selector: 'textarea',
  height: 500,
  menubar: false,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table paste code help wordcount'
  ],
  toolbar: 'undo redo | formatselect | ' +
  ' bold italic backcolor | alignleft aligncenter ' +
  ' alignright alignjustify | bullist numlist outdent indent |' +
  ' removeformat | help',
  content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tiny.cloud/css/codepen.min.css'
  ]
});
<?php if(isset($one_members['gender']) && $one_members['gender'] != null){ ?>
  <?php if($one_members['gender'] == "0"){ ?>
    $(function(){
      $("input[name='gender'][value='0']").attr("checked", true);
    });
  <?php } else if($one_members['gender'] == "1") { ?>
    $(function(){
      $("input[name='gender'][value='1']").attr("checked", true);
    });
  <?php } ?>
  <?php } ?>
</script>


</body>

</html>