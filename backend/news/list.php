<?php
require_once('../is_login.php');
require_once("../../function/connection.php");
$query = $db->query('SELECT * FROM news ORDER BY published_at DESC');
$news = $query->fetchAll(PDO::FETCH_ASSOC);
$Total_Rows=count($news);
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
          </ul>
          <a class="btn btn-light" href="create.php" style="margin-bottom:20px;">新增一筆</a>
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>發布日期</th>
                  <th>圖片</th>
                  <th>標題</th>
                  <th>操作</th>
                </tr>
              </thead>
              <tbody>
                <?php if ($Total_Rows>0){?>
                <?php foreach ($news as $data){ ?>
                <tr>
                  <td><?php echo $data["published_at"]; ?></td>
                  <td><img src="../../uploads/news/<?php echo $data["picture"]?>" width="200" alt=""></td>
                  <td><?php echo $data["title"]; ?></td>
                  <td>
                    <a class="btn btn-light" href="update.php?newsID=<?php echo $data["newsID"]?>">編輯</a>
                    <a class="btn btn-light" href="delete.php?newsID=<?php echo $data["newsID"]?>" onclick="if(!confirm('是否確認刪除此筆資料?確認刪除後無法復原')){return false;};">刪除</a>
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