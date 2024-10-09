<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Manual; 

class ManualController extends Controller
{
    public function show($brand_id, $brand_slug, $manual_id )
    {
        $brand = Brand::findOrFail($brand_id);
        $manual = Manual::findOrFail($manual_id);
        
        return view('pages/manual_view', [
            "manual" => $manual,
            "brand" => $brand,
        ]);
    }
    public function edit($id)
    {
        $manual = Manual::findOrFail($id);
        return view('pages.edit_manual', compact('manual'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'filesize' => 'required|integer',
            'originUrl' => 'required|url',
            'filename' => 'required|string|max:255',
            'downloadedServer' => 'required|boolean',
        ]);

        $manual = Manual::findOrFail($id);
        $manual->update($request->all());

        return redirect()->route('manuals.edit', $id)->with('success', value: 'Manual updated successfully');
    }

    public function incrementVisit($id)
    {
        $manual = Manual::findOrFail($id);
        $manual->increment('visit_count');
        
        return redirect()->away($manual->originUrl);
    }
}
