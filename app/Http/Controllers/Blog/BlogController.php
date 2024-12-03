<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Services\BlogService;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    protected $blogService;

    public function __construct(BlogService $blogService)
    {
        $this->blogService = $blogService;
    }

    public function index(Request $request)
    {
        $blogs = $this->blogService->getAllBlog(15, false, [], $request);

        if ($blogs['code'] != 200) {
            abort($blogs['code']);
        }

        $data['blogs'] = $blogs['data'];

        return view('blogs.index', $data);
    }

    public function create()
    {
        return view('blogs.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:blogs,slug',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'content' => 'required|string',
        ]);
        $response = $this->blogService->createBlog($validatedData);

        if ($response['code'] !== 200) {
            return redirect()->route('blogs.create')->with('error', $response['message']);
        }
    
        return redirect()->route('blogs.index');
    }

    public function edit() {}

    public function update() {}

    public function show($id)
    {
        $response = $this->blogService->getAccountById($id);

        if ($response['code'] !== 200) {
            return redirect()->route('blogs.index')->with('error', $response['message']);
        }

        return view('blogs.show', [
            'blog' => $response['data']
        ]);
    }

    public function destroy($id)
    {
        $blogs = $this->blogService->deleteBlog($id);

        if ($blogs['code'] != 200) {
            abort($blogs['code']);
        }

        return redirect(route('blogs.index'))->with('success', $blogs['message']);
    }
}
