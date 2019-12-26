<?php
require_once('../is_login.php');
require_once("../../function/connection.php");
?>

<?php
if(isset($_POST["AddForm"]) && $_POST["AddForm"] == "INSERT"){
  if(!file_exists('../../uploads/products')){
    mkdir('../../uploads/products',0755,true);
  }
  
  if(isset($_FILES["picture"]["name"])&& $_FILES["picture"]["name"] != null){
    $filename=$_FILES['picture']['name'];
    $file_path="../../uploads/products/".$_FILES['picture']['name'];
    move_uploaded_file($_FILES["picture"]["tmp_name"],$file_path);
  }else{
    $filename=null;
  }
  if(isset($_FILES["picture1"]["name"])&& $_FILES["picture1"]["name"] != null){
    $filename1=$_FILES['picture1']['name'];
    $file_path="../../uploads/products/".$_FILES['picture1']['name'];
    move_uploaded_file($_FILES["picture1"]["tmp_name"],$file_path);
  }else{
    $filename1=null;
  }
  if(isset($_FILES["picture2"]["name"])&& $_FILES["picture2"]["name"] != null){
    $filename2=$_FILES['picture2']['name'];
    $file_path="../../uploads/products/".$_FILES['picture2']['name'];
    move_uploaded_file($_FILES["picture2"]["tmp_name"],$file_path);
  }else{
    $filename2=null;
  }

  $sql = "INSERT INTO products (product_categoryID, picture,picture1,picture2, name, price, description, created_at) VALUES (:product_categoryID, :picture,:picture1,:picture2, :name, :price, :description, :created_at)";
  $sth=$db->prepare($sql);
  $sth->bindparam(":product_categoryID",$_POST['product_categoryID'],PDO::PARAM_INT);
  $sth->bindparam(":picture",$filename,PDO::PARAM_STR);
  $sth->bindparam(":picture1",$filename1,PDO::PARAM_STR);
  $sth->bindparam(":picture2",$filename2,PDO::PARAM_STR);
  $sth->bindparam(":name",$_POST["name"],PDO::PARAM_STR);
  $sth->bindparam(":price",$_POST["price"],PDO::PARAM_STR);
  $sth->bindparam(":description",$_POST["description"],PDO::PARAM_STR);
  $sth->bindparam(":created_at",$_POST["created_at"],PDO::PARAM_STR);
  $sth->execute();

  header("Location: list.php?level1_ID=".$_POST['product_categoryID']."&name=".$_POST["category"]);
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
          <h1 class="">產品管理</h1>
          <ul class="breadcrumb">
            <li class="breadcrumb-item"> <a href="#"><i class="fa fa-home"></i> 主控台</a> </li>
            <li class="breadcrumb-item active">產品管理</li>
            <li class="breadcrumb-item active"><?php echo $_GET["name"];?></li>
            <li class="breadcrumb-item active">新增一筆</li>
          </ul>
          <form id="products_create" class="text-right" method="post" action="create.php" enctype="multipart/form-data">
            <div class="form-group row"> <label for="inputmailh" class="col-2 col-form-label">產品圖片一</label>
              <div class="col-10">
                <input type="file" class="form-control-file" id="inputmailh" name="picture"> </div>
            </div>
            <div class="form-group row"> <label for="picture1" class="col-2 col-form-label">產品圖片二</label>
              <div class="col-10">
                <input type="file" class="form-control-file" id="picture1" name="picture1"> </div>
            </div>
            <div class="form-group row"> <label for="picture2" class="col-2 col-form-label">產品圖片三</label>
              <div class="col-10">
                <input type="file" class="form-control-file" id="picture2" name="picture2"> </div>
            </div>
            <div class="form-group row"> <label for="name" class="col-2 col-form-label">產品名稱</label>
              <div class="col-10">
                <input type="text" class="form-control" id="name" name="name"> </div>
            </div>
            <div class="form-group row"> <label for="price" class="col-2 col-form-label">產品金額</label>
              <div class="col-10">
                <input type="text" class="form-control" id="price" name="price"> </div>
            </div>
            <div class="form-group row">
              <label for="description" class="col-2">產品說明</label>
              <div class="col-10" style="text-align:left;">
                <textarea class="form-control" name="description" id="description" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: 134px;"></textarea>
              </div>
            </div>
            <a class="btn btn-outline-primary" href="javascript:alert('確定要離開');history.go(-1);">回上一頁</a>
            <button type="submit" class="btn btn-primary">確認</button>
            <input type="hidden" name="created_at" value="<?php echo date("Y-m-d H:i:s");?>">
            <input type="hidden" name="AddForm" value="INSERT">
            <input type="hidden" name="product_categoryID" value="<?php echo $_GET['level1_ID'];?>">
            <input type="hidden" name="category" value="<?php echo $_GET['name'];?>">
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php include_once("../layouts/footer.php"); ?><script>

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