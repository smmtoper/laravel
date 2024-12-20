<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function show()
    {
        return view('form');
    }
    
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
        ]);
    
        $data = $request->only(['name', 'email']);
        $filename = 'data_' . uniqid() . '.json';
        Storage::disk('local')->put($filename, json_encode($data));
    
        return redirect()->route('form')->with('success', 'Data saved successfully!');
    }
    
    public function showData()
    {
        $files = Storage::disk('local')->files();
        $data = [];
    
        foreach ($files as $file) {
            $content = Storage::disk('local')->get($file);
            $data[] = json_decode($content, true);
        }
    
        return view('data', compact('data'));
    }
    
}
