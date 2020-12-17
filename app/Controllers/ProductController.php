<?php

namespace app\Controllers;

use app\Models\Product;
use framework\Tools\Request;
use framework\Tools\View;

class ProductController
{
  public function show()
  {
    return View::get('products', [
      'time' => date('l jS \of F Y h:i:s A'),
      'products' => Product::all(),
      'xsstest' => '<b style="color: blue;">Cross-site Scripting test (XSS)</b>',
      'copyrightYear' => date('Y'),
    ]);
  }

  public function add()
  {
    $name = Request::fetchPOST('name');
    $price = Request::fetchPOST('price');

    if ($name == null || $price == null)
      return View::get('product_form');

    $product = new Product();

    $product->name = $name;
    $product->price = $price;

    $product->save();

    header('Location: /products');
    exit();
  }
}
