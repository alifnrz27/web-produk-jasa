<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Exception;

class ProductService
{
    public function getAllProducts($search = null)
    {
        try {
            return Product::when($search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%")
                             ->orWhere('description', 'like', "%{$search}%");
            })->get();
        } catch (Exception $e) {
            logger()->error('Kesalahan saat mengambil produk: ' . $e->getMessage());
            throw $e;
        }
    }
    
    public function getProductById($id)
    {
        try {
            return Product::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            logger()->error('Produk tidak ditemukan: ' . $e->getMessage());
            throw $e;
        } catch (Exception $e) {
            logger()->error('Kesalahan saat mengambil produk: ' . $e->getMessage());
            throw $e;
        }
    }
    
    public function createProduct($data)
    {
        try {
            $imagePath = null;
            if (isset($data['image'])) {
                $imagePath = $data['image']->store('product_images', 'public');
            }

            return Product::create([
                'name' => $data['name'],
                'description' => $data['description'],
                'price' => $data['price'],
                'image' => $imagePath,
            ]);
        } catch (Exception $e) {
            logger()->error('Kesalahan saat membuat produk: ' . $e->getMessage());
            throw $e;
        }
    }

    public function updateProduct($id, $data)
    {
        try {
            $product = Product::findOrFail($id);

<<<<<<<<< Temporary merge branch 1
        if (isset($data['image'])) {
=========
        if (isset($data[' image'])) {
>>>>>>>>> Temporary merge branch 2
            if ($product->image) {
                Storage::delete($product->image);
            }
            $data['image'] = $data['image']->store('product_images', 'public');
        } else {
            $data['image'] = $product->image;
        }

            $product->update([
                'name' => $data['name'],
                'description' => $data['description'],
                'price' => $data['price'],
                'image' => $data['image'],
            ]);

            return $product;
        } catch (ModelNotFoundException $e) {
            logger()->error('Produk tidak ditemukan: ' . $e->getMessage());
            throw $e;
        } catch (Exception $e) {
            logger()->error('Kesalahan saat memperbarui produk: ' . $e->getMessage());
            throw $e;
        }
    }

    public function deleteProduct($id)
    {
        try {
            $product = Product::findOrFail($id);

            if ($product->image) {
                Storage::delete($product->image);
            }

            $product->delete();

            return $product;
        } catch (ModelNotFoundException $e) {
            logger()->error('Produk tidak ditemukan: ' . $e->getMessage());
            throw $e;
        } catch (Exception $e) {
            logger()->error('Kesalahan saat menghapus produk: ' . $e->getMessage());
            throw $e;
        }
    }

}
