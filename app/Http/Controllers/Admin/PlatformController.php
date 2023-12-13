<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Platform;
use Illuminate\Http\Request;

class PlatformController extends Controller
{
    public function index()
    {
        $platforms = Platform::all();

        return view('admin.platform.index', ['platforms' => $platforms]);
    }

    public function create()
    {
        return view('admin.platform.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'pay_out_1' => 'nullable|numeric',
            'pay_out_2' => 'nullable|numeric',
            'ship_date' => 'nullable|integer',
        ]);

        $data['immediately'] = $request->has('immediately');

        Platform::create($data);

        return redirect()->route('platform')->with('success', 'Platform created successfully!');
    }

    public function edit($id)
    {
        $platform = Platform::findOrFail($id);
        $disablePayOut = $platform->immediately;
    
        return view('admin.platform.edit', compact('platform', 'disablePayOut'));
    }
    
    public function update(Request $request, $id)
    {
        $platform = Platform::findOrFail($id);
        
        $data = $request->validate([
            'name' => 'required',
            'pay_out_1' => 'nullable|numeric',
            'pay_out_2' => 'nullable|numeric',
            'ship_date' => 'nullable|integer',
            
        ]);
        $data['immediately'] = $request->has('immediately');
        
        if ($data['immediately']) {
            $data['pay_out_1'] = null;
            $data['pay_out_2'] = null;
        }
        
        $platform->update($data);
        return redirect()->route('platform')->with('success', 'Platform updated successfully!');
    }


    public function destroy($id)
    {
        $platform = Platform::findOrFail($id);
        $platform->delete();
        
        return redirect()->route('platform')->with('success', 'Platform deleted successfully!');
    }
}
