<?php
require_once('../is_login.php');
require_once("../../function/connection.php");

if(isset($_POST["EditForm"]) && $_POST["EditForm"] == "UPDATE"){
  if(!file_exists('../../uploads/products')){
    mkdir('../../uploads/products',0755,true);
  }
  if(isset($_FILES["picture"]["name"]) && $_FILES["picture"]["name"] != null){
    $filename=$_FILES['picture']['name'];
    $file_path="../../uploads/products/".$_FILES['picture']['name'];
    move_uploaded_file($_FILES["picture"]["tmp_name"],$file_path);
   }else{
    $filename=$_POST["old_picture"];
   }
  $sql="UPDATE products SET picture=:picture, name=:name, price=:price, updated_at=:updated_at WHERE productID=:productID";
  $sth=$db->prepare($sql);
  $sth->bindParam(":picture",$filename,PDO::PARAM_STR);
  $sth->bindParam(":name",$_POST["name"],PDO::PARAM_STR);
  $sth->bindParam(":price",$_POST["price"],PDO::PARAM_STR);
  $sth->bindParam(":updated_at",$_POST['updated_at'],PDO::PARAM_STR);
  $sth->bindParam(":productID",$_POST["productID"],PDO::PARAM_INT);
  $sth->execute();

  header("Location: list.php?level1_ID=".$_POST['product_categoryID']."&name=".$_POST["category"]);
 }else{
  $query=$db->query("SELECT * FROM products WHERE productID=".$_GET["productID"]);
  $one_products=$query->fetch(PDO::FETCH_ASSOC);
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
            <li class="breadcrumb-item active">編輯<?php echo $_GET["productname"];?></li>
          </ul>
          <form id="products_update" class="text-right" method="post" action="update.php" enctype="multipart/form-data">
            <div class="form-group row"> <label for="inputmailh" class="col-2 col-form-label">產品圖片</label>
              <div class="col-10 text-left">
                <img class="mb-2" src="../../uploads/products/<?php echo $one_products["picture"]?>" width="200" alt="">
                <input type="hidden" name="old_picture" value="<?php echo $one_products['picture'];?>">  
                <input type="file" class="form-control-file" id="inputmailh" name="picture"> </div>
            </div>
            <div class="form-group row"> <label for="name" class="col-2 col-form-label">產品名稱</label>
              <div class="col-10">
                <input type="text" class="form-control" id="name"  name="name" value="<?php echo $one_products["name"]?>"> </div>
            </div>
            <div class="form-group row"> <label for="price" class="col-2 col-form-label">產品金額</label>
              <div class="col-10">
                <input type="text" class="form-control" id="price" name="price" value="<?php echo $one_products["price"]?>"> </div>
            </div>
            <div class="form-group row">
              <label for="description" class="col-2">產品說明</label>
              <div class="col-10">
                <textarea class="form-control" name="description" id="description" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: 134px;"><?php echo $one_products["description"]?></textarea>
              </div>
            </div>
            <a class="btn btn-outline-primary" href="javascript:alert('確定要離開');history.go(-1);">回上一頁</a>
            <button type="submit" class="btn btn-primary">確認</button>
            <input type="hidden" name="updated_at" value="<?php echo date("Y-m-d H:i:s");?>">
            <input type="hidden" name="EditForm" value="UPDATE">
            <input type="hidden" name="productID" value="<?php echo $one_products['productID'];?>"> 
            <!-- 可用$one_products['productsID']或$_GET["productsID"] -->
            <input type="hidden" name="product_categoryID" value="<?php echo $_GET['level1_ID'];?>">
            <input type="hidden" name="category" value="<?php echo $_GET['name'];?>">
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php include_once("../layouts/footer.php"); ?><script>
$(function(){
  $( "#published_at" ).datepicker({
    dateFormat:"yy-mm-dd"
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
  price_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tiny.cloud/css/codepen.min.css'
  ]
});
</script></body>

</html>