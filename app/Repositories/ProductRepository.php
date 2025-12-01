<?php

namespace App\Repositories;

use App\Models\ProductModel;

class ProductRepository
{
    private $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

    public function createNew($request)
    {
        $this->productModel->create([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'price' => $request->get('price'),
            'amount' => $request->get('amount'),
            'image' => $request->get('image'),
        ]);
    }

    public function updateProduct($request, $product)
    {
        $product->update([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'amount' => $request->get('amount'),
            'price' => $request->get('price'),
            'image' => $request->get('image'),
        ]);
    }

    public function getProductById($id)
    {
        return $this->productModel->where(['id' => $id])->first();
    }

}

