<?php
require_once('../is_login.php');
require_once("../../function/connection.php");
$query=$db->query("SELECT * FROM members");
$members=$query->fetchAll(PDO::FETCH_ASSOC);
$Total_members=count($members);
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
            <li class="breadcrumb-item active">會員管理</li>
          </ul>
          <a class="btn btn-light" href="create.php" style="margin-bottom:20px;">新增會員</a>
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>姓名</th>
                  <th>帳號</th>
                  <th>等級</th>
                  <th>電子信箱</th>
                  <th>操作</th>
                </tr>
              </thead>
              <tbody>
                <?php if($Total_members > 0){ ?>
                <?php foreach ($members as $person){ ?>
                <tr>
                  <td><?php echo $person["name"]; ?></td>
                  <td><?php echo $person["account"]; ?></td>
                  <td><?php echo $person["level"];?></td>
                  <td><?php echo $person["email"];?></td>
                  <td>
                    <a class="btn btn-outline-primary" href="details.php?memberID=<?php  echo $person["memberID"]; ?>">查看明細</a>
                    <a class="btn btn-light" href="update.php?memberID=<?php  echo $person["memberID"]; ?>">編輯</a>
                    <a class="btn btn-light" href="delete.php?memberID=<?php  echo $person["memberID"]; ?>" onclick="if(!confirm('是否確認刪除此筆資料?確認刪除後無法復原')){return false;};">刪除</a>
                  </td>
                </tr>
                <?php } ?>
                <?php }else{ ?>
                  <tr>
                    <td colspan="5">目前無資料，請新增一筆</td>
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