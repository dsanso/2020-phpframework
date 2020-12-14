<?php

namespace app\Controllers;

use app\Models\Product;

class ProductController
{
  public function show()
  {
    $products = Product::all();

    // print_r($products);
    // return view('myname', [
    //   'name' => $name
    // ]);

    return $products;
  }
}
