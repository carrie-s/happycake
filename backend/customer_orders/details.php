<?php
require_once('../is_login.php');
require_once("../../function/connection.php");
$query=$db->query("SELECT * FROM customer_orders WHERE customer_orderID=".$_GET["customer_orderID"]);
$order=$query->fetch(PDO::FETCH_ASSOC);
$query2=$db->query("SELECT * FROM members WHERE memberID=".$order["memberID"]);
$member=$query2->fetch(PDO::FETCH_ASSOC);
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
            <li class="breadcrumb-item active">查看訂單 #<?php echo $order['order_no'] ?>明細</li>
          </ul>
          <form id="news_create" class="text-right" method="" action="">
          <div class="form-group row">
            <label for="status" class="col-3 col-form-label">訂單狀態</label>
              <div class="col-9">
                <input type="text" class="form-control-plaintext" readonly id="status" name="status" value=""> </div>
        
              </div>
            <div class="form-group row"> <label for="order_no" class="col-3 col-form-label">訂單編號</label>
              <div class="col-9">
                <input type="text" class="form-control-plaintext" readonly id="order_no" name="order_no" value="<?php echo $order['order_no'] ?>"> </div>
            </div>
            <div class="form-group row"> <label for="order_date" class="col-3 col-form-label">訂購日期</label>
              <div class="col-9">
                <input type="text" class="form-control-plaintext" readonly id="order_date" name="order_date" value="<?php echo $order['order_date'] ?>"> </div>
            </div>
            <div class="form-group row"> <label for="member" class="col-3 col-form-label">訂購會員</label>
              <div class="col-9">
                <input type="text" class="form-control-plaintext" readonly id="member" name="member" value="<?php echo $member['name'] ?>"> </div>
            </div>
            <div class="form-group row"> <label for="name" class="col-3 col-form-label">收件人姓名</label>
              <div class="col-9">
                <input type="text" class="form-control-plaintext" readonly id="name" name="name" value="<?php echo $order['name'] ?>"> </div>
            </div>
            <div class="form-group row"> <label for="phone" class="col-3 col-form-label">收件人電話</label>
              <div class="col-9">
                <input type="text" class="form-control-plaintext" readonly id="phone" name="phone" value="<?php echo $order['phone'] ?>"> </div>
            </div>
            <div class="form-group row"> <label for="address" class="col-3 col-form-label">收件人地址</label>
              <div class="col-9">
                <input type="text" class="form-control-plaintext" readonly id="address" name="address" value="<?php echo $order['address'] ?>"> </div>
            </div>
            <div class="form-group row"> <label for="total" class="col-3 col-form-label">金額(未含運)</label>
              <div class="col-9">
                <input type="text" class="form-control-plaintext" readonly id="total" name="total" value="$NT <?php echo $order['total'] ?>"> </div>
            </div>
            <div class="form-group row"> <label for="shipping" class="col-3 col-form-label">運費</label>
              <div class="col-9">
                <input type="text" class="form-control-plaintext" readonly id="shipping" name="shipping" value="$NT <?php echo $order['shipping'] ?>"> </div>
            </div>
            <div class="form-group row"> <label for="pay_method" class="col-3 col-form-label">付款方式</label>
              <div class="col-9">
                <input type="text" class="form-control-plaintext" readonly id="pay_method" name="pay_method" value="<?php echo $order['pay_method'] ?>"> </div>
            </div>
            <div class="form-group row"> <label for="receive_method" class="col-3 col-form-label">寄送方式</label>
              <div class="col-9">
                <input type="text" class="form-control-plaintext" readonly id="receive_method" name="receive_method" value="<?php echo $order['receive_method'] ?>"> </div>
            </div>
            <a class="btn btn-outline-primary" href="update.php?customer_orderID=<?php echo $_GET["customer_orderID"]; ?>">編輯</a>
            <a  class="btn btn-primary" href="list.php?status=all">確認</a>
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
<?php if($order['status']=="0"){?>
$(function(){
  $("input[name='status']").val("待付款");
});
<?php }elseif($order['status']=="1"){ ?>
  $(function(){
  $("input[name='status']").val("已完成");
});
<?php }elseif($order['status']=="2"){ ?>
  $(function(){
  $("input[name='status']").val("待收貨");
});
<?php }elseif($order['status']=="3"){ ?>
  $(function(){
  $("input[name='status']").val("待出貨");
});
<?php }elseif($order['status']=="99"){ ?>
  $(function(){
  $("input[name='status']").val("取消交易");
});
<?php } ?>
</script>


</body>

</html>