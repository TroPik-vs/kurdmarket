<?php
require 'config.php';
$id=(int)($_POST['id']??0);$q=max(1,(int)($_POST['quantity']??1));
if($id){$_SESSION['cart'][$id]=($_SESSION['cart'][$id]??0)+$q;}
header('Location: cart.php'); exit;
?>