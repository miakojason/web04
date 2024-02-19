<?php include_once "./db.php";
$_POST['no']=date("Ymd").rand(100000,999999);
$_POST['cart']=serialize($_SESSION['cart']);
$_POST['acc']=$_SESSION['mem'];
$Order->save($_POST);
unset($_SESSION['cart']);//刪除前一筆訂單的紀錄，再次購買才不會再次出現
?>
<script>
    alert("訂購成功!\n感謝您的選購");
    location.href="../index.php";
</script>
