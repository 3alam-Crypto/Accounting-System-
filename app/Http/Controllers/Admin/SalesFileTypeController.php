<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SalesFileType;

class SalesFileTypeController extends Controller
{
    public function index()
    {
        $salesFileTypes = SalesFileType::all();
        return view('admin.sale.fileType.index', compact('salesFileTypes'));
    }

    public function create()
    {
        return view('admin.sale.fileType.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        SalesFileType::create($request->all());

        return redirect()->route('saleFileType')->with('success', 'Sales file type created successfully.');
    }
    
    public function edit(SalesFileType $salesFileType)
    {
        return view('admin.sale.fileType.edit', compact('salesFileType'));
    }
    
    public function update(Request $request, SalesFileType $salesFileType)
    {
        $request->validate([
            'name' => 'required|string'
        ]);
        $salesFileType->update($request->all());
        
        return redirect()->route('saleFileType')->with('success', 'Sales file type updated successfully.');
    }
    
    
    public function destroy(SalesFileType $salesFileType)
    {
        $salesFileType->delete();
        
        return redirect()->route('saleFileType')->with('success', 'Sales file type deleted successfully.');
    }

    
}
