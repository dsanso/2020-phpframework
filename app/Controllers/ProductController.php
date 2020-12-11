<?php

namespace app\Controllers;

use app\Models\Product;

class ProductController
{
  public function show($name)
  {
    $products = Product::all();
    // return view('myname', [
    //   'name' => $name
    // ]);

    return 'hello mate ' . $name;
  }
}
