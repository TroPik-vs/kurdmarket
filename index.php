<?php include 'header.php';
$categories = $pdo->query("SELECT * FROM categories")->fetchAll();
$products = $pdo->query("SELECT p.*, c.name category FROM products p JOIN categories c ON c.id=p.category_id ORDER BY p.id DESC LIMIT 8")->fetchAll();
?>
<section class="hero">
  <div><h1>هەموو شتێک لە یەک شوێن 🛍️</h1><p>لە خواردن و خواردنەوە تا جل‌وبەرگ، ئەلیکترۆنیات و پێداویستییەکانی ماڵ.</p><a class="btn" href="products.php">دەست بکە بە کڕین</a></div>
</section>
<h2>بەشەکان</h2>
<div class="categories">
<?php foreach($categories as $c): ?>
<a class="category" href="products.php?category=<?= $c['id'] ?>"><span><?= htmlspecialchars($c['icon']) ?></span><?= htmlspecialchars($c['name']) ?></a>
<?php endforeach; ?>
</div>
<div class="section-title"><h2>نوێترین کاڵاکان</h2><a href="products.php">بینینی هەموو</a></div>
<div class="grid">
<?php foreach($products as $p): ?>
<div class="card">
<img src="<?= htmlspecialchars($p['image']) ?>" alt="<?= htmlspecialchars($p['name']) ?>">
<div class="card-body"><small><?= htmlspecialchars($p['category']) ?></small><h3><?= htmlspecialchars($p['name']) ?></h3><p><?= htmlspecialchars($p['description']) ?></p><strong><?= number_format($p['price'],2) ?> $</strong><a class="btn small" href="product.php?id=<?= $p['id'] ?>">بینینی کاڵا</a></div>
</div>
<?php endforeach; ?>
</div>
<?php include 'footer.php'; ?>