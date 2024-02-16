<?php
//這段上面，還沒登入可以先儲存商品到購物車
if (isset($_GET['id'])) {
    $_SESSION['cart'][$_GET['id']] = $_GET['qt'];
}
//這段如果在上面沒登入會直接跳到登入頁面，無法存放商品到購物車
if (!isset($_SESSION['mem'])) {
    to("?do=login");
}

echo "<h2 class='ct'>{$_SESSION['mem']}的購物車</h2>";

if (empty($_SESSION['cart'])) {
    echo "<h2 class='ct'>購物車中尚無商品</h2>";
}
?>
<table class="all">
    <tr class="tt ct">
        <td>編號</td>
        <td>商品名稱</td>
        <td>數量</td>
        <td>庫存量</td>
        <td>單價</td>
        <td>小計</td>
        <td>刪除</td>
    </tr>
    <?php
    foreach ($_SESSION['cart'] as $id => $qt) {
        $goods = $Goods->find($id);
    ?>
        <tr class="pp ct">
            <td><?= $goods['no']; ?></td>
            <td><?= $goods['name']; ?></td>
            <td><?= $qt; ?></td>
            <td><?= $goods['stock']; ?></td>
            <td><?= $goods['price']; ?></td>
            <td><?= $goods['price'] * $qt; ?></td>
            <td><img src="./icon/0415.jpg" onclick="delCart(<?= $id; ?>)"></td>
        </tr>
    <?php
    }
    ?>
</table>
<div class="ct">
    <img src="./icon/0411.jpg" onclick="location.href='index.php'">
    <img src="./icon/0412.jpg" onclick="location.href='?do=checkout'">
</div>
<script>
    function delCart(id) {
        $.post("./api/del_cart.php", {
            id
        }, () => {
            // location.reload();//重整會導致刪不掉最後一個，因為網址上還有id&qt重整又重新判斷抓取資料，刪了又新增刪了又新增。
            location.href = "?do=buycart";
        })
    }
</script>