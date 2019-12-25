<?php
require_once('../is_login.php');
require_once("../../function/connection.php");

if(isset($_POST["EditForm"]) && $_POST["EditForm"] == "UPDATE"){
  // 圖片上傳用
  // if(!file_exists('../../uploads/members')){
  //   mkdir('../../uploads/members',0755,true);
  // }
  
  // if(isset($_FILES["picture"]["name"]) && $_FILES["picture"]["name"] != null){
  //   $filename=$_FILES['picture']['name'];
  //   $file_path="../../uploads/members/".$_FILES['picture']['name'];
  //   move_uploaded_file($_FILES["picture"]["tmp_name"],$file_path);
  //  }else{
  //   $filename=$_POST["old_picture"];
  //  }
  $sql = "UPDATE customer_orders SET status=:status, order_no=:order_no, order_date=:order_date, name=:name, phone=:phone, address=:address, total=:total, shipping=:shipping, pay_method=:pay_method, receive_method=:receive_method, updated_at=:updated_at WHERE customer_orderID=:customer_orderID";
  $sth=$db->prepare($sql);
  $sth->bindparam(":status",$_POST["status"],PDO::PARAM_INT);
  $sth->bindparam(":order_no",$_POST["order_no"],PDO::PARAM_STR);
  $sth->bindparam(":order_date",$_POST["order_date"],PDO::PARAM_STR);
  $sth->bindparam(":name",$_POST["name"],PDO::PARAM_STR);
  $sth->bindparam(":phone",$_POST["phone"],PDO::PARAM_STR);
  $sth->bindparam(":address",$_POST["address"],PDO::PARAM_STR);
  $sth->bindparam(":total",$_POST["total"],PDO::PARAM_STR);
  $sth->bindparam(":shipping",$_POST["shipping"],PDO::PARAM_STR);
  $sth->bindparam(":pay_method",$_POST["pay_method"],PDO::PARAM_STR);
  $sth->bindparam(":receive_method",$_POST["receive_method"],PDO::PARAM_STR);
  $sth->bindparam(":updated_at",$_POST["updated_at"],PDO::PARAM_STR);
  $sth->bindparam(":customer_orderID",$_POST["customer_orderID"],PDO::PARAM_STR);
  $sth->execute();

  header("Location: list.php?status=all");
 }else{
    $query=$db->query("SELECT * FROM customer_orders WHERE customer_orderID=".$_GET["customer_orderID"]);
    $order=$query->fetch(PDO::FETCH_ASSOC);
    $query2=$db->query("SELECT * FROM members WHERE memberID=".$order["memberID"]);
    $member=$query2->fetch(PDO::FETCH_ASSOC);
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
          <h1 class="">訂單管理</h1>
          <ul class="breadcrumb">
            <li class="breadcrumb-item"> <a href="#"><i class="fa fa-home"></i> 主控台</a> </li>
            <li class="breadcrumb-item active"><a href="list.php?status=all">訂單管理</a></li>
            <li class="breadcrumb-item active">編輯訂單 #<?php echo $order['order_no'] ?></li>
          </ul>
          <form id="news_create" class="text-right" method="post" action="update.php">
            <div class="form-group row">
              <div class="col-3">訂單狀態</div>
              <div class="col-9 text-left">
                <!-- <div class="form-check form-check-inline">
                  <input class="form-check-input checked" type="radio" name="status" id="order_new" value="0">
                  <label class="form-check-label" for="order_new">新訂單</label>
                </div> -->
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="status" id="wait_pay" value="0">
                  <label class="form-check-label" for="wait_pay">待付款</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="status" id="order_success" value="1">
                  <label class="form-check-label" for="order_success">已完成</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="status" id="wait_receive" value="2">
                  <label class="form-check-label" for="wait_receive">待收貨</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="status" id="wait_sent" value="3">
                  <label class="form-check-label" for="wait_sent">待出貨</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="status" id="order_false" value="99">
                  <label class="form-check-label" for="order_false">取消交易</label>
                </div>
              </div>
            </div>
            <div class="form-group row"> <label for="order_no" class="col-3 col-form-label">訂單編號</label>
              <div class="col-9">
                <input type="text" class="form-control-plaintext" readonly id="order_no" name="order_no" value="<?php echo $order['order_no'] ?>"> </div>
            </div>
            <div class="form-group row"> <label for="order_date" class="col-3 col-form-label">訂單日期</label>
              <div class="col-9">
                <input type="text" class="form-control" id="order_date" name="order_date" value="<?php echo $order['order_date'] ?>"> </div>
            </div>
            <div class="form-group row"> <label for="member" class="col-3 col-form-label">訂購會員</label>
              <div class="col-9">
                <input type="text" class="form-control-plaintext" readonly id="member" name="member" value="<?php echo $member['name'] ?>"> </div>
            </div>
            <div class="form-group row"> <label for="name" class="col-3 col-form-label">收件人姓名</label>
              <div class="col-9">
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $order['name'] ?>"> </div>
            </div>
            <div class="form-group row"> <label for="phone" class="col-3 col-form-label">收件人電話</label>
              <div class="col-9">
                <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $order['phone'] ?>"> </div>
            </div>
            <div class="form-group row"> <label for="address" class="col-3 col-form-label">收件人地址</label>
              <div class="col-9">
                <input type="text" class="form-control" id="address" name="address" value="<?php echo $order['address']; ?>"> </div>
            </div>
            <div class="form-group row"> <label for="total" class="col-3 col-form-label">金額(未含運)</label>
              <div class="col-9">
                <input type="text" class="form-control" id="total" name="total" value="<?php echo $order['total'] ?>"> </div>
            </div>
            <div class="form-group row"> <label for="shipping" class="col-3 col-form-label">運費</label>
              <div class="col-9">
                <input type="text" class="form-control" id="shipping" name="shipping" value="<?php echo $order['shipping'] ?>"> </div>
            </div>
            <div class="form-group row"> <label for="pay_method" class="col-3 col-form-label">付款方式</label>
              <div class="col-9">
                <input type="text" class="form-control" id="pay_method" name="pay_method" value="<?php echo $order['pay_method'] ?>"> </div>
            </div>
            <div class="form-group row"> <label for="receive_method" class="col-3 col-form-label">寄送方式</label>
              <div class="col-9">
                <input type="text" class="form-control" id="receive_method" name="receive_method" value="<?php echo $order['receive_method'] ?>"> </div>
            </div>
            <a class="btn btn-outline-primary" href="javascript:alert('確定要離開');history.go(-1);">回上一頁</a>
            <button type="submit" class="btn btn-primary">確認</button>
            <input type="hidden" name="updated_at" value="<?php echo date("Y-m-d H:i:s");?>">
            <input type="hidden" name="EditForm" value="UPDATE">
            <input type="hidden" name="customer_orderID" value="<?php echo $_GET['customer_orderID'];?>"> 
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php include_once("../layouts/footer.php"); ?>
  <script src="../../js/jquery.twzipcode.min.js"></script>
  <script>
$(function(){
  $( "#birthday" ).datepicker({
    changeYear:true,
    changeMonth:true,
    dateFormat:"yy-mm-dd",      //中間用,(逗號)分開
    yearRange:"1930:2001",
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
  content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tiny.cloud/css/codepen.min.css'
  ]
});
<?php if(isset($order['status']) && $order['status'] != null){ ?>
  <?php if($order['status'] == "0"){ ?>
    $(function(){
      $("input[name='status'][value='0']").attr("checked", true);
    });
  <?php } else if($order['status'] == "1") { ?>
    $(function(){
      $("input[name='status'][value='1']").attr("checked", true);
    });
  <?php } else if($order['status'] == "2") { ?>
    $(function(){
      $("input[name='status'][value='2']").attr("checked", true);
    });
  <?php } else if($order['status'] == "3") { ?>
    $(function(){
      $("input[name='status'][value='3']").attr("checked", true);
    });
  <?php } else if($order['status'] == "99") { ?>
    $(function(){
      $("input[name='status'][value='99']").attr("checked", true);
    });
  <?php } ?>
<?php } ?>
</script>


</body>

</html>