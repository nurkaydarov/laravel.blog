<?php
namespace App\Http\Controllers;
use \App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Client\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::query()->orderBy('title', 'asc')->paginate(4);

        return view('posts.categories', compact('categories'));
    }
    public function show($slug)
    {
        $category = Category::with('posts')->where('slug', $slug)->paginate(4);
        $posts = $category->posts()->orderBy('id', 'desc')->paginate(3);
        return view('posts.category', compact('posts', 'category'));
    }


}
