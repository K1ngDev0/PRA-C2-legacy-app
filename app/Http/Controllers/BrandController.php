<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Manual;

class BrandController extends Controller
{
    public function show($category_id, $category_slug, $brand_id, $brand_slug)
    {
    
        $brand = Brand::with('category')->findOrFail($brand_id);
        $manuals = Manual::where('brand_id', $brand_id)->get(); // Updated to use `where`
        $brand->increment('visit_count');


        return view('pages/manual_list', [
            "brand" => $brand,
            "manuals" => $manuals,
            "category" => $brand->category // Pass the category to the view
        ]);
    }
    
    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('pages.edit_brand', compact('brand'));
    }
}
