<?php
// list_products.php
require_once "bootstrap.php";

$productRepository = $entityManager->getRepository("Product");
$products = $productRepository->findAll();

foreach ($products as $product) {
  echo sprintf("%d - %s\n", $product->getId(), $product->getName());
}
