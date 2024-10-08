<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Brand;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($category_id, $category_slug)
    {
        $category = Category::findOrFail($category_id);
        $brands = Brand::where('category_id', $category_id)->orderBy('name', 'asc')->get();

        return view('pages.category_list', compact('category', 'brands'));
    }
}
