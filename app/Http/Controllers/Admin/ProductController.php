<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Language;
use App\Models\Product;
use App\Traits\imageTrait;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use imageTrait;

    public function __construct()
    {
        $this->middleware('permission:add_product-sidebar', ['only' => ['create','store']]);
        $this->middleware('permission:all_products-sidebar', ['only' => ['index']]);
    }

    public function index()
    {
        $products = Product::all();
        return view('admin.products.all_products' , compact('products'));
    }

    public function create()
    {
        $languages = Language::all();
        return view('admin.products.add_product' , compact('languages'));
    }

    public function store(ProductRequest $request)
    {
        $validation = $request->validated();
        $validation['image'] = $this->addImage('products');
        Product::create($validation);
        return to_route('products.index')->with('success' , 'Product Added Successfully');
    }
}
