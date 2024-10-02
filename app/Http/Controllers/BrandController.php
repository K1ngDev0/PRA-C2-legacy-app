<?php
namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Manual;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Toon de specifieke brand.
     */
    public function show($brand_id, $brand_slug)
    {
        $brand = Brand::findOrFail($brand_id);
        $manuals = Manual::where('brand_id', $brand_id)->get();

        // Verhoog de view_count
        $brand->increment('view_count');

        return view('pages/manual_list', [
            "brand" => $brand,
            "manuals" => $manuals
        ]);
    }
}