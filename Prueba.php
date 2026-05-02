<?php

use App\User;
use Database\ProductModel;

require_once 'vendor/autoload.php';
$user = new App\User;
echo $user->getName();
echo "\n";

$product = new Database\ProductModel;
echo $product->getId();
echo "\n";
?>