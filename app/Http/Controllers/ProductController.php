<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveProductRequest;
use App\Models\ProductModel;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $productRepo;

    public function __construct()
    {
        $this->productRepo = new ProductRepository();
    }

    public function getAllProducts()
    {
        $products = ProductModel::all();
        return view('admin.allProducts', compact('products'));
    }

    public function saveProduct(SaveProductRequest $request)
    {
        $this->productRepo->createNew($request);
        return redirect()->route('product.all');
    }

    public function deleteProduct(ProductModel $product)
    {
        $product->delete();
        return redirect()->back();
    }

    public function editProduct(ProductModel $product)
    {
        return view('admin.editProduct', compact('product'));
    }

    public function updateProduct(SaveProductRequest $request, ProductModel $product)
    {
        $this->productRepo->updateProduct($request, $product);
        return redirect()->route('product.all');
    }

    public function permalink(ProductModel $product)
    {
        return view('permalink', compact('product'));
    }
}
