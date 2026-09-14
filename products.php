<?php include 'header.php';
$categories=$pdo->query("SELECT * FROM categories")->fetchAll();
$where=''; $params=[];
if(isset($_GET['category']) && ctype_digit($_GET['category'])){$where=' WHERE category_id=?';$params[]=$_GET['category'];}
if(!empty($_GET['q'])){$where .= ($where?' AND ':' WHERE ').'name LIKE ?';$params[]='%'.$_GET['q'].'%';}
$stmt=$pdo->prepare("SELECT * FROM products $where ORDER BY id DESC");$stmt->execute($params);$products=$stmt->fetchAll();
?>
<h1>کاڵاکان</h1>
<form class="search" method="get"><input name="q" placeholder="گەڕان بە ناوی کاڵا..." value="<?= htmlspecialchars($_GET['q']??'') ?>"><button class="btn">گەڕان</button></form>
<div class="filters"><a href="products.php">هەموو</a><?php foreach($categories as $c): ?><a href="products.php?category=<?=$c['id']?>"><?=$c['icon']?> <?=htmlspecialchars($c['name'])?></a><?php endforeach;?></div>
<div class="grid">
<?php foreach($products as $p): ?><div class="card"><img src="<?=htmlspecialchars($p['image'])?>" alt=""><div class="card-body"><h3><?=htmlspecialchars($p['name'])?></h3><p><?=htmlspecialchars($p['description'])?></p><strong><?=number_format($p['price'],2)?> $</strong><a class="btn small" href="product.php?id=<?=$p['id']?>">بینینی کاڵا</a></div></div><?php endforeach;?>
</div>
<?php if(!$products): ?><p class="empty">هیچ کاڵایەک نەدۆزرایەوە.</p><?php endif; include 'footer.php'; ?>