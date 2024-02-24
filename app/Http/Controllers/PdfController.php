<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PdfController extends Controller
{
    public function index()
    {
        // Fetch PDF files from the storage directory
        $files = Storage::disk('public')->files('pdfs');
        return view('menu2',[
            'files' =>$files
        ]);
    }

    public function show($filename)
    {
        // Get the full path to the PDF file
        $path = storage_path('app/public/pdfs/' . $filename);
        
        // Display PDF file
        return response()->file($path);
    }
}
