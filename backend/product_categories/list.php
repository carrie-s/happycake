<?php
require_once('../is_login.php');
require_once("../../function/connection.php");
$query=$db ->query("SELECT * FROM product_categories");
$product_categories=$query->fetchAll(PDO::FETCH_ASSOC);
$Total_Rows=count($product_categories);
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
            <li class="breadcrumb-item active"><a href="../product_categories/list.php">產品管理</a></li>
          </ul>
          <a class="btn btn-light mb-2" href="create.php" >新增分類</a>
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>產品分類名稱</th>
                  <th width="30%">操作</th>
                </tr>
              </thead>
              <tbody>
              <?php if($Total_Rows>0){?>
                <?php foreach ($product_categories as $class){ ?>
                <tr>
                  <td><?php echo $class["category"]; ?></td>
                  <td>
                    <a class="btn btn-light" href="../products/list.php?level1_ID=<?php echo $class['product_categoryID']?>&name=<?php echo $class["category"]?>">產品管理</a>
                    <a class="btn btn-light" href="update.php?product_categoryID=<?php echo $class['product_categoryID']?>">編輯</a>
                    <a class="btn btn-light" href="delete.php?product_categoryID=<?php echo $class['product_categoryID']?>" onclick="if(!confirm('是否確認刪除此筆資料?確認刪除後無法復原！')){return false;};">刪除</a>
                  </td>
                </tr>
                <?php } ?>
              <?php } else{?>
                  <tr>
                    <td colspan="2">目前無資料，請新增一筆</td>
                  </tr>
              <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include_once("../layouts/footer.php"); ?>
</body>

</html>