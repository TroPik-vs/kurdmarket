<?php require_once 'config.php'; ?>
<!DOCTYPE html>
<html lang="ku" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>بازاڕی کوردی</title>
<link rel="stylesheet" href="assets/style.css">
</head>
<body>
<header>
  <div class="container nav">
    <a class="logo" href="index.php">🛍️ بازاڕی کوردی</a>
    <nav>
      <a href="index.php">سەرەکی</a>
      <a href="products.php">کاڵاکان</a>
      <a href="cart.php">🛒 سەبەتە (<?= isset($_SESSION['cart']) ? array_sum($_SESSION['cart']) : 0 ?>)</a>
      <a href="admin.php">بەڕێوەبەر</a>
    </nav>
  </div>
</header>
<main class="container">