<?php include 'header.php'; $cart=$_SESSION['cart']??[]; if(!$cart){header('Location: products.php');exit;}
if($_SERVER['REQUEST_METHOD']==='POST'){
 $name=trim($_POST['name']);$phone=trim($_POST['phone']);$address=trim($_POST['address']);
 $ids=array_keys($cart);$marks=implode(',',array_fill(0,count($ids),'?'));$s=$pdo->prepare("SELECT * FROM products WHERE id IN ($marks)");$s->execute($ids);$products=$s->fetchAll();$total=0;foreach($products as $p)$total+=$p['price']*$cart[$p['id']];
 $pdo->beginTransaction();$pdo->prepare("INSERT INTO orders(customer_name,phone,address,total) VALUES(?,?,?,?)")->execute([$name,$phone,$address,$total]);$oid=$pdo->lastInsertId();$ins=$pdo->prepare("INSERT INTO order_items(order_id,product_id,quantity,price) VALUES(?,?,?,?)");foreach($products as $p)$ins->execute([$oid,$p['id'],$cart[$p['id']],$p['price']]);$pdo->commit();unset($_SESSION['cart']);header("Location: success.php?id=$oid");exit;
}
?>
<h1>تەواوکردنی کڕین</h1><form class="form" method="post"><label>ناوی تەواو<input required name="name"></label><label>ژمارەی مۆبایل<input required name="phone"></label><label>ناونیشان<textarea required name="address"></textarea></label><button class="btn">ناردنی داواکاری</button></form>
<?php include 'footer.php'; ?>