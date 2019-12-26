<?php
require_once('../is_login.php');
require_once("../../function/connection.php");
if($_GET['status']== "all"){
  $query=$db->query("SELECT * FROM customer_orders ORDER BY created_at DESC");
  $customer_orders=$query->fetchAll(PDO::FETCH_ASSOC);
}else{
  $query=$db->query("SELECT * FROM customer_orders WHERE status='".$_GET['status']."' ORDER BY created_at DESC");
  $customer_orders=$query->fetchAll(PDO::FETCH_ASSOC);
}
$Total_orders=count($customer_orders);
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
          <h1 class="">訂單管理-
            <?php switch($_GET['status']){
                    case "all":
                      echo "全部訂單";
                      break; 
                    case 0:
                      echo "待付款訂單";
                      break;  
                    case 1:
                      echo "已完成交易";
                      break;  
                    case 2:
                      echo "待收貨訂單";
                      break;  
                    case 3:
                      echo "待出貨訂單";
                      break;  
                    case 99:
                      echo "訂單已取消";
                      break;  
            } ?>
          </h1>
          <ul class="breadcrumb">
            <li class="breadcrumb-item"> <a href="#"><i class="fa fa-home"></i> 主控台</a> </li>
            <li class="breadcrumb-item active">訂單管理</li>
          </ul>
          <!-- <form class="form-inline"> -->
            <div class="form-row">

                <!-- <div class="col-auto">
                  <a class="btn btn-light mb-2" href="#">新增一筆</a>
                </div> -->
                <div class="col-auto col-md-3">
                  <select class="form-control form-group" id="status" name="status">
                      <option value="all" <?php if($_GET["status"]=="all"){ echo "selected";}?>>全部訂單</option>
                      <option value="0" <?php if($_GET["status"]=="0"){ echo "selected"; }?>>待付款訂單</option>
                      <option value="1" <?php if($_GET["status"]=="1"){ echo "selected"; }?>>已完成交易</option>
                      <option value="2" <?php if($_GET["status"]=="2"){ echo "selected"; }?>>待收貨訂單</option>
                      <option value="3" <?php if($_GET["status"]=="3"){ echo "selected"; }?>>待出貨訂單</option>
                      <option value="99" <?php if($_GET["status"]=="99"){ echo "selected"; }?>>訂單已取消</option>
                  </select>
                </div>
 
            </div>
          <!-- </form> -->
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>訂單狀態</th>
                  <th>訂單編號</th>
                  <th>訂購日期</th>
                  <th>收件人姓名</th>
                  <th>收件人電話</th>
                  <th>金額</th>
                  <th>操作</th>
                </tr>
              </thead>
              <tbody>
                <?php if($Total_orders>0){?>
                <?php foreach ($customer_orders as $one_order){ ?>
                <tr>
                  <td><?php echo $one_order["status"]; ?></td>
                  <td><?php echo $one_order["order_no"]; ?></td>
                  <td><?php echo $one_order["order_date"]; ?></td>
                  <td><?php echo $one_order["name"];?></td>
                  <td><?php echo $one_order["phone"];?></td>
                  <td><?php echo $one_order["total"]+$one_order["shipping"];?></td>
                  <td>
                    <a class="btn btn-outline-primary" href="details.php?customer_orderID=<?php echo $one_order["customer_orderID"]; ?>">查看明細</a>
                    <a class="btn btn-light" href="update.php?customer_orderID=<?php echo $one_order["customer_orderID"]; ?>">編輯</a>
                    
                  </td>
                </tr>
                <?php } ?>
                <?php } else { ?>
                  <tr>
                    <td colspan="7">目前無訂單</td>
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
  <script>
  $(function(){
      $("select[name='status']").change(function(){
        console.log($("select[name='status']").val());
        window.location="list.php?status="+$("select[name='status']").val();
      });
  });
  </script>
</body>

</html>