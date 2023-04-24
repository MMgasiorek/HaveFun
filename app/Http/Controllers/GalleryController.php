<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function create()
    {
        return view('memories.create');
    }

    public function store(Request $request, int $id)
    {
        $path = $request->file('image')->store('public/img/'.$id);
        Storage::url($path);

        return back()->with('success','photo added');
    }
}
