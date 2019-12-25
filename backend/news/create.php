<?php
require_once('../is_login.php');
require_once("../../function/connection.php");
?>

<?php
if(isset($_POST["AddForm"]) && $_POST["AddForm"] == "INSERT"){
  if(!file_exists('../../uploads/news')){
    mkdir('../../uploads/news',0755,true);
  }
  
  if(isset($_FILES["picture"]["name"])&& $_FILES["picture"]["name"] != null){
    $filename=$_FILES['picture']['name'];
    $file_path="../../uploads/news/".$_FILES['picture']['name'];
    move_uploaded_file($_FILES["picture"]["tmp_name"],$file_path);
  }else{
    $filename="cake1.jpg";
  }

  $sql = "INSERT INTO news (picture, published_at, title, content, created_at) VALUES (:picture, :published_at, :title, :content, :created_at)";
  $sth=$db->prepare($sql);
  $sth->bindparam(":picture",$filename,PDO::PARAM_STR);
  $sth->bindparam(":published_at",$_POST["published_at"],PDO::PARAM_STR);
  $sth->bindparam(":title",$_POST["title"],PDO::PARAM_STR);
  $sth->bindparam(":content",$_POST["content"],PDO::PARAM_STR);
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
          <h1 class="">最新消息管理</h1>
          <ul class="breadcrumb">
            <li class="breadcrumb-item"> <a href="#"><i class="fa fa-home"></i> 主控台</a> </li>
            <li class="breadcrumb-item active">最新消息管理</li>
            <li class="breadcrumb-item active">新增一筆</li>
          </ul>
          <form id="news_create" class="text-right" method="post" action="create.php" enctype="multipart/form-data">
            <div class="form-group row"> <label for="inputmailh" class="col-2 col-form-label">圖片</label>
              <div class="col-10">
                <input type="file" class="form-control-file" id="inputmailh" name="picture"> </div>
            </div>
            <div class="form-group row"> <label for="published_at" class="col-2 col-form-label">發布日期</label>
              <div class="col-10">
                <input type="text" class="form-control" id="published_at" name="published_at"> </div>
            </div>
            <div class="form-group row"> <label for="inputpasswordh" class="col-2 col-form-label">標題</label>
              <div class="col-10">
                <input type="text" class="form-control" id="inputpasswordh" placeholder="title" name="title"> </div>
            </div>
            <div class="form-group row">
              <label for="exampleFormControlTextarea1" class="col-2">內容</label>
              <div class="col-10" style="text-align:left;">
                <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: 134px;"></textarea>
              </div>
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
  <?php include_once("../layouts/footer.php"); ?><script>
$(function(){
  $( "#published_at" ).datepicker({
    dateFormat:"yy-mm-dd",      //中間用,(逗號)分開
    minDate: "2019-12-03"
  });
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
</script></body>

</html>