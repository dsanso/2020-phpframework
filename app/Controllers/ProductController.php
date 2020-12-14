<?php

namespace app\Controllers;

use app\Models\Product;
use framework\Tools\View;

class ProductController
{
  public function show()
  {
    return View::get('products', [
      'name' => 'John Doe',
      'products' => Product::all(),
    ]);
  }
}
