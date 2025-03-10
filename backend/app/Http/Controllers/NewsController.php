<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index()
    {
        // Mengambil semua berita
        return response()->json(News::all());
    }

    public function show($slug)
    {
        // Mencari berita berdasarkan slug
        $news = News::where('slug', $slug)->firstOrFail();
        return response()->json($news);
    }

    public function store(Request $request)
    {
        // Validasi inputan
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required|min:10',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Proses penyimpanan berita
        $news = News::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'image' => $request->image ? $request->file('image')->store('images', 'public') : null,
        ]);

        // Kembalikan response dengan status 201 (created)
        return response()->json($news, 201);
    }
}
