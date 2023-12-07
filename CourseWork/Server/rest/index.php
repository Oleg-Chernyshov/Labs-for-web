<?php
require_once '../vendor/autoload.php';
require_once "../classes/product_type.php";
require_once "../classes/products.php";
require_once "../classes/orders.php";
require_once "../classes/customers.php";

$app = new Silex\Application();
header("Access-Control-Allow-Origin: *");

$app->get('/product_type/list.json', function () use ($app){
	$cur_material = new ProductType;
	$list = $cur_material->read();
	return $app->json($list);
});

$app->get('/products/list.json', function () use ($app){
	$cur_product = new Product;
	$list = $cur_product->read();
	return $app->json($list);
});

$app->get('/orders/list.json', function () use ($app){
	$cur_orders = new Orders;
	$list = $cur_orders->read();
	return $app->json($list);
});

$app->get('/orders/bar_data', function () use ($app){
	$cur_order = new Orders;
	$data = $cur_order->get_order_bar_data();
	return $app->json($data);
});

$app->get('/customers/list.json', function () use ($app){
	$cur_orders = new Customers;
	$list = $cur_orders->read();
	return $app->json($list);
});


$app->get('/products/max_cost', function () use ($app){
	$cur_product = new Product;
	$max = $cur_product->get_max_price_product();
	return $app->json($max);
});

$app->run();