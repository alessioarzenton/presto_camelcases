<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        $categories = Category::all();
        $ads = $category->ads()->paginate(8);
        $name = $category->name;
        return view('categories.show',compact('category', 'ads', 'categories','name'));
    }
}
