<?php
require_once('../is_login.php');
require_once("../../function/connection.php");

if(isset($_POST["EditForm"]) && $_POST["EditForm"] == "UPDATE"){
  $sql="UPDATE product_categories SET category=:category,updated_at=:updated_at WHERE product_categoryID=:product_categoryID";
  $sth=$db->prepare($sql);
  $sth->bindParam(":category",$_POST["category"],PDO::PARAM_STR);
  $sth->bindParam(":updated_at",$_POST["updated_at"],PDO::PARAM_STR);
  $sth->bindParam(":product_categoryID",$_POST["product_categoryID"],PDO::PARAM_INT);
  $sth->execute();

  header("Location: list.php");

}else{
$query=$db ->query("SELECT * FROM product_categories WHERE product_categoryID=".$_GET['product_categoryID']);
$one_product_categories=$query->fetch(PDO::FETCH_ASSOC);
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
            <li class="breadcrumb-item active">編輯分類</li>
          </ul>
          <form id="news_update" class="text-right" method="post" action="update.php">
            <div class="form-group row"> <label for="inputpasswordh" class="col-2 col-form-label">分類</label>
              <div class="col-10">
                <input type="text" class="form-control" id="inputpasswordh" name="category" value="<?php echo $one_product_categories['category']?>"> </div>
            </div>
            <a class="btn btn-outline-primary" href="javascript:alert('確定要離開');history.go(-1);">回上一頁</a>
            <button type="submit" class="btn btn-primary">確認</button>
            <input type="hidden" name="updated_at" value="<?php echo date("Y-m-d H:i:s");?>">
            <input type="hidden" name="EditForm" value="UPDATE">
            <input type="hidden" name="product_categoryID" value="<?php echo $one_product_categories['product_categoryID'];?>"> 
            <!-- 可用$one_news['newsID']或$_GET["newsID"] -->
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
</script>
</body>

</html>