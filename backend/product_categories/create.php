<?php
require_once('../is_login.php');
require_once("../../function/connection.php");
?>

<?php
if(isset($_POST["AddForm"]) && $_POST["AddForm"] == "INSERT"){
$sql="INSERT INTO product_categories (category,created_at) VALUES (:category,:created_at)";
$sth=$db->prepare($sql);
$sth->bindParam(":category",$_POST["category"],PDO::PARAM_STR);
$sth->bindParam(":created_at",$_POST["created_at"],PDO::PARAM_STR);
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
          <h1 class="">產品管理</h1>
          <ul class="breadcrumb">
            <li class="breadcrumb-item"> <a href="#"><i class="fa fa-home"></i> 主控台</a> </li>
            <li class="breadcrumb-item active">產品管理</li>
            <li class="breadcrumb-item active">新增分類</li>
          </ul>
          <form id="product_catedories_create" class="text-right" method="post" action="create.php">
            <div class="form-group row"> <label for="inputpasswordh" class="col-2 col-form-label">分類</label>
              <div class="col-10">
                <input type="text" class="form-control" id="inputpasswordh" name="category"> </div>
            </div>
            <a class="btn btn-outline-primary" href="javascript:alert('確定要離開');history.go(-1);">回上一頁</a>
            <button type="submit" class="btn btn-primary">確認</button>
            <input type="hidden" name="created_at" value="<?php echo date('Y-m-d H:i:s')?>">
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
</script>
</body>

</html>