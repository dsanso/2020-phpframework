<?php

namespace app\Controllers;

use app\Models\Product;
use framework\Tools\View;

class ProductController
{
  public function show()
  {
    // return Product::all();

    return View::get('products', [
      'name' => 'Doe',
    ]);
  }
}
