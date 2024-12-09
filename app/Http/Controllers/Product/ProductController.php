<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index(Request $request)
    {
        $search = $request->input('search');
        $products = $this->productService->getAllProducts($search);

        return view('products.index', ['products' => $products]);
    }

    public function search(Request $request)
    {
        $search = $request->input('search'); 
        $products = $this->productService->searchProducts($search); 

        return view('search', ['products' => $products, 'search' => $search]); 
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        logger()->info('Product Data: ', $request->all());

        $request->validate([
            'name' => 'required|string|max:255|',
            'description' => 'string',
            'price' => 'required|numeric|',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'name.required' => 'Nama produk wajib diisi.',
            'price.required' => 'Harga produk wajib diisi.',
        ]);

        $this->productService->createProduct($request->all());

        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan!');
    }
    

    public function edit($id)
    {
        $product = $this->productService->getDetailProduct($id);

        return view('products.edit', ['product' => $product]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|',
            'description' => 'required|string|',
            'price' => 'required|numeric|',
            'image' => 'nullable|image|max:2048',
        ], [
            'name.required' => 'Nama produk wajib diisi.',
            'description.required' => 'Deskripsi produk wajib diisi.',
            'price.required' => 'Harga produk wajib diisi.',
        ]);
        $this->productService->updateProduct($id, $request);

        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui!');
    }

    public function show($id)
    {
        $product = $this->productService->getDetailProduct($id);
        return view('products.show', ['product' => $product]);
    }

    public function destroy($id)
    {
        $this->productService->deleteProduct($id);

        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus!');
    }
}