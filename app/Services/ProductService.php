<?php

namespace App\Services;

use App\Models\Product;
use App\Repository\ProductRepositoryInterface;

class ProductService
{
    private $productRepository;
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function allProducts()
    {
        return $this->productRepository->all();
    }

    public function getProducts($data)
    {
        return Product::where(['section_id' => $data])->get();
    }

    public function updateProduct(Product $product, array $data)
    {
        $product->update($data);

        return $product;
    }


    // public function getProducts()
    // {
    //     return Product::all();
    // }

    // public function getProduct(int $id)
    // {
    //     return Product::find($id);
    // }

    // public function createProduct(array $data)
    // {
    //     return Product::create($data);
    // }

    // public function updateProduct(int $id, array $data)
    // {
    //     $product = Product::find($id);
    //     $product->update($data);

    //     return $product;
    // }

    // public function deleteProduct(int $id)
    // {
    //     Product::destroy($id);
    // }
}
