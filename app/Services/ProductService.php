<?php

namespace App\Services;

use App\Models\Product;

class ProductService
{

    private $productModel;

    public function __construct()
    {
        $this->productModel = new Product();
    }

    public function all()
    {
        return $this->productModel->all();
    }

    public function create(array $product): Product
    {
        return $this->productModel->create($product);
    }

    public function show(int $id)
    {
        return $this->productModel->where(['id' => $id]);
    }
}
