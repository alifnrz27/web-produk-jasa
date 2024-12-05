<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductService
{
    public function getAllProducts($search = null)
    {
        return Product::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                         ->orWhere('description', 'like', "%{$search}%");
        })->get();
    }

    public function createProduct($data)
    {
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
    }

    public function updateProduct($id, $data)
    {
        $product = Product::findOrFail($id);

        if (isset($data[' image'])) {
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
    }

    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);

        if ($product->image) {
            Storage::delete($product->image);
        }

        $product->delete();

        return $product;
    }

    public function getProductById($id)
    {
        return Product::findOrFail($id);
    }
}
