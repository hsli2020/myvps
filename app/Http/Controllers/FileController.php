<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\File;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $files = File::latest()->paginate(10);
        return view('files.index', compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('files.upload');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:204800|mimes:jpg,png,pdf,doc,docx,zip',
        ]);

        $file = $request->file('file');
        $filename = time() . '_' . $file->getClientOriginalName();
        $path = $file->storeAs('uploads', $filename, 'public');

        $fileRecord = File::create([
            'sid' => substr(time(), 4, 6), // rand(100000, 999999)
            'original_name' => $file->getClientOriginalName(),
            'stored_name' => $filename,
            'note' => $request->input('note'),
            'mime_type' => $file->getMimeType(),
            'size' => $file->getSize(),
            'path' => $path,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('files.index')->with('success', '上传成功');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //$file = File::findOrFail($id);
        //Storage::disk('public')->delete($file->path);
        //$file->delete();
        return redirect()->route('files.index')->with('success', '删除成功');
    }

    public function download($sid)
    {
        $file = File::where('sid', $sid)->firstOrFail();
        return Storage::disk('public')->download($file->path, $file->original_name);
    }
}
