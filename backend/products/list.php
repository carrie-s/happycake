<?php
require_once('../is_login.php');
require_once("../../function/connection.php");
$query = $db->query('SELECT * FROM products WHERE product_categoryID='.$_GET["level1_ID"].' ORDER BY created_at DESC');
$products = $query->fetchAll(PDO::FETCH_ASSOC);
$Total_Rows=count($products);
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
            <li class="breadcrumb-item active"><?php echo $_GET["name"];?></li>
          </ul>
          <a class="btn btn-light mb-2" href="create.php?level1_ID=<?php echo $_GET['level1_ID']?>&name=<?php echo $_GET['name']?>">新增一筆</a>
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>商品圖片</th>
                  <th>商品名稱</th>
                  <th>商品金額</th>
                  <th>操作</th>
                </tr>
              </thead>
              <tbody>
                <?php if ($Total_Rows>0){?>
                <?php foreach ($products as $data){ ?>
                <tr>
                  <td><img src="../../uploads/products/<?php echo $data["picture"]?>" width="200" alt=""></td>
                  <td><?php echo $data["name"]; ?></td>
                  <td><?php echo $data["price"]; ?></td>
                  <td>
                    <a class="btn btn-light" href="update.php?level1_ID=<?php echo $_GET['level1_ID']?>&name=<?php echo $_GET['name']?>&productID=<?php echo $data["productID"]?>&productname=<?php echo $data["name"]?>">編輯</a>
                    <a class="btn btn-light" href="delete.php?level1_ID=<?php echo $_GET['level1_ID']?>&name=<?php echo $_GET['name']?>&productID=<?php echo $data["productID"]?>" onclick="if(!confirm('是否確認刪除此筆資料?確認刪除後無法復原')){return false;};">刪除</a>
                  </td>
                </tr>
                <?php } ?>
                <?php } else{?>
                  <tr>
                    <td colspan="4">目前無資料，請新增一筆</td>
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