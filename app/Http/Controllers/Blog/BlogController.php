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

    public function index(Request $request){
        $blogs = $this->blogService->getAllBlog(15, false, [], $request);

        if($blogs['code'] != 200){
            abort($blogs['code']);
        }

        $data['blogs'] = $blogs['data'];

        return view('blogs.index', $data);
    }

    public function destroy($id){
        $blogs = $this->blogService->deleteBlog($id);

        if($blogs['code'] != 200){
            abort($blogs['code']);
        }

        return redirect(route('blogs.index'))->with('success', $blogs['message']);
    }
}
