<?php
require_once('../is_login.php');
require_once("../../function/connection.php");
if(isset($_POST["EditForm"]) && $_POST["EditForm"] == "UPDATE"){
  $sql="UPDATE page SET content=:content,updated_at=:updated_at WHERE pageID=2";
  $sth=$db->prepare($sql);
  $sth->bindParam(":content",$_POST["content"],PDO::PARAM_STR);
  $sth->bindParam(":updated_at",$_POST['updated_at'],PDO::PARAM_STR);
  $sth->execute();

  header("Location: update.php?pageID=2&Edit=success");
}else{
$query=$db->query("SELECT * FROM page WHERE pageID=2");
$one_page=$query->fetch(PDO::FETCH_ASSOC);
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
          <h1 class="">關於我們管理</h1>
          <ul class="breadcrumb">
            <li class="breadcrumb-item"> <a href="#"><i class="fa fa-home"></i> 主控台</a> </li>
            <li class="breadcrumb-item active">關於我們管理</li>
            <li class="breadcrumb-item active">編輯</li>
          </ul>
          <form id="page_update" class="text-right" method="post" action="update.php">
            <div class="form-group row"> <label for="inputpasswordh" class="col-2 col-form-label">標題</label>
              <div class="col-10">
                <input contenteditable="false" type="text" class="form-control" id="inputpasswordh" name="title" value="<?php echo $one_page["title"]?>" readonly> </div>
            </div>
            <div class="form-group row">
              <label for="exampleFormControlTextarea1" class="col-2">內容</label>
              <div class="col-10">
                <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: 134px;"><?php echo $one_page["content"]?></textarea>
              </div>
            </div>
            <a class="btn btn-outline-primary" href="javascript:alert('確定要離開');history.go(-1);">回上一頁</a>
            <button type="submit" class="btn btn-primary" onclick="javascript:alert('送出資料');">確認</button>
            <input type="hidden" name="updated_at" value="<?php echo date("Y-m-d H:i:s");?>">
            <input type="hidden" name="EditForm" value="UPDATE">
            <input type="hidden" name="pageID" value="<?php echo $one_page['pageID'];?>"> 
            <!-- 可用$one_page['pageID']或$_GET["pageID"] -->
          </form>
        </div>
      </div>
    </div>
  </div>
<!-- Modal -->
<div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
        資料更新成功
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">知道了</button>
      </div>
    </div>
  </div>
</div>
  <?php include_once("../layouts/footer.php"); ?>
<script>
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
</script>

 <?php if(isset($_GET['Edit']) && $_GET['Edit'] != null){ ?>
  <script>
  $(function(){
    $("#basicExampleModal").modal();
  });
  </script>

 <?php } ?>
</body>

</html>