<?php
require_once('../is_login.php');
require_once("../../function/connection.php");
  $query=$db->query("SELECT * FROM members WHERE memberID=".$_GET["memberID"]);
  $one_members=$query->fetch(PDO::FETCH_ASSOC);

foreach($one_members as $k=>$v){
  if(!$v && $v == null){
    $one_members[$k]="-----";
  }
}
echo $one_members["gender"];
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
            <li class="breadcrumb-item active">會員資料明細</li>
          </ul>
          <form id="news_create" class="text-right">
            <div class="form-group row"> <label for="name" class="col-3 col-form-label">姓名</label>
              <div class="col-9">
                <input type="text" class="form-control-plaintext" readonly id="name" name="name" value="<?php echo $one_members['name'] ?>"> </div>
            </div>
            <div class="form-group row"> <label for="gender" class="col-3 col-form-label">性別</label>
              <div class="col-9">
                <input type="text" class="form-control-plaintext" readonly id="gender" name="gender" value=""> </div>
            </div>
            <!-- <div class="form-group row">
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
            </div> -->
            <div class="form-group row"> <label for="account" class="col-3 col-form-label">帳號</label>
              <div class="col-9">
                <input type="text" class="form-control-plaintext" readonly id="account" name="account" value="<?php echo $one_members['account'] ?>"> </div>
            </div>
            <div class="form-group row"> <label for="password" class="col-3 col-form-label">密碼</label>
              <div class="col-9">
                <input type="text" class="form-control-plaintext" readonly id="password" name="password" value="<?php echo $one_members['password'] ?>"> </div>
            </div>
            <div class="form-group row"> <label for="birthday" class="col-3 col-form-label">生日</label>
              <div class="col-9">
                <input type="text" class="form-control-plaintext" readonly id="birthday" name="birthday" value="<?php echo $one_members['birthday'] ?>"> </div>
            </div>
            <div class="form-group row"> <label for="level" class="col-3 col-form-label">會員等級</label>
              <div class="col-9">
                <input type="text" class="form-control-plaintext" readonly id="level" name="level" value="<?php echo $one_members['level'] ?>"> </div>
            </div>
            <div class="form-group row"> <label for="phone" class="col-3 col-form-label">通訊電話</label>
              <div class="col-9">
                <input type="text" class="form-control-plaintext" readonly id="phone" name="phone" value="<?php echo $one_members['phone'] ?>"> </div>
            </div>
            <div class="form-group row"> <label for="mobile" class="col-3 col-form-label">行動電話</label>
              <div class="col-9">
                <input type="text" class="form-control-plaintext" readonly id="mobile" name="mobile" value="<?php echo $one_members['mobile'] ?>"> </div>
            </div>
            <div class="form-group row"> <label for="email" class="col-3 col-form-label">電子信箱</label>
              <div class="col-9">
                <input type="text" class="form-control-plaintext" readonly id="email" name="email" value="<?php echo $one_members['email'] ?>"> </div>
            </div>

            <div id="twzipcode" class="row">
              <label for="zipcode" class="col-sm-3 col-3 form-group col-form-label">郵遞區號</label>
              <div class="col-sm-1 col-9 form-group">
                <input type="text" class="form-control-plaintext" readonly id="zipcode" name="zipcode" value="<?php echo $one_members['zipcode'] ?>">
              </div>
              <label for="county" class="col-sm-1 col-3 form-group col-form-label">城市</label>
              <div class="col-sm-3 col-9 form-group">
              <input type="text" class="form-control-plaintext" readonly id="county" name="county" value="<?php echo $one_members['county'] ?>">
              </div>
              <label for="district" class="col-sm-1 col-3 form-group col-form-label">地區</label>
              <div class="col-sm-3 col-9 form-group">
              <input type="text" class="form-control-plaintext" readonly id="district" name="district" value="<?php echo $one_members['district'] ?>">
                </select>
              </div>
            </div>

            <div class="form-group row"> <label for="address" class="col-3 col-form-label" >通訊地址</label>
              <div class="col-9">
                <input type="text" class="form-control-plaintext" readonly id="address" name="address" value="<?php echo $one_members['address'] ?>"> </div>
            </div>
            <a class="btn btn-outline-primary" href="javascript:alert('確定要離開');history.go(-1);">回上一頁</a>
            <a href="update.php?memberID=<?php  echo $_GET['memberID']; ?>" class="btn btn-primary">編輯</a>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php include_once("../layouts/footer.php"); ?>
  <script src="../../js/jquery.twzipcode.min.js"></script>
  <script>
// $(function(){
//   $( "#birthday" ).datepicker({
//     changeYear:true,
//     changeMonth:true,
//     dateFormat:"yy-mm-dd",      //中間用,(逗號)分開
//     yearRange:"1930:2001",
//   });
// });

// $(function(){
//   $("#twzipcode").twzipcode({
//     'zipcodeSel'  : '<?php// echo $one_members['zipcode'] ?>',     // 此參數會優先於 countySel, districtSel
//     'countySel'   : '<?php// echo $one_members['county'] ?>',
//     'districtSel' : '<?php//echo $one_members['district'] ?>'
//             });
//   $("#twzipcode").find("input[name='zipcode']").eq(1).remove();
//   $("#twzipcode").find("select[name='county']").eq(1).remove();
//   $("#twzipcode").find("select[name='district']").eq(1).remove();
// });

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
<?php if($one_members["gender"] == "-----"){?>
  $(function(){
    $("#gender").val("-----");
  });
<?php }else if($one_members["gender"]==1){ ?>
  $(function(){
    $("#gender").val("男");
  });
<?php }else if($one_members["gender"] == 0){ ?>
  $(function(){
    $("#gender").val("女");
  });
<?php } ?>
</script>
  <?php // if(isset($one_members['gender']) && $one_members['gender'] != null){ ?>
  <?php // if($one_members['gender'] == "0"){ ?>

  <?php // } else if($one_members['gender'] == "1") { ?>

  <?php // } ?>
  <?php // } ?>

</body>

</html>