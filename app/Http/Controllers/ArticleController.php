<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Tampilkan semua artikel.
     */
    public function index()
    {
        $articles = Article::all();
        return view('articles.index', compact('articles'));
    }

    /**
     * Form tambah artikel.
     */
    public function create()
    {
         if (Auth::user()->level_id != 1) {
    abort(403, 'Anda tidak memiliki izin untuk mengakses halaman ini.');
}
        return view('articles.create');

    }

    /**
     * Simpan artikel baru.
     */
    public function store(Request $request)
{
     if (Auth::user()->level_id != 1) {
    abort(403, 'Anda tidak memiliki izin untuk mengakses halaman ini.');
}
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'file' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
    ]);

    Log::info('📥 Memulai proses penyimpanan artikel');

    if ($request->hasFile('file')) {
        $file = $request->file('file');
        $originalName = $file->getClientOriginalName();
        $fileName = time() . '_' . $originalName;

        Log::info('🖼 File ditemukan', ['original' => $originalName]);

        // simpan file
        $path = $file->storeAs('uploads', $fileName);

        $validated['file'] = $fileName;
    } else {
        Log::warning('⚠ Tidak ada file yang dikirim dari form.');
    }

    Article::create($validated);


    return redirect()->route('articles.index')->with('success', 'Artikel berhasil ditambahkan!');
}

    /**
     * Tampilkan detail artikel.
     */
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    /**
     * Form edit artikel.
     */
    public function edit(Article $article)
    {
        if (Auth::user()->level_id != 1) {
    abort(403, 'Anda tidak memiliki izin untuk mengakses halaman ini.');
}
        
        return view('articles.edit', compact('article'));
    }

    /**
     * Update artikel.
     */
    public function update(Request $request, Article $article)
    {
       if (Auth::user()->level_id != 1) {
    abort(403, 'Anda tidak memiliki izin untuk mengakses halaman ini.');
}
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
        ]);

        $article->update($request->all());

        return redirect()->route('articles.index')
                         ->with('success', 'Artikel berhasil diperbarui.');
    }

    /**
     * Hapus artikel.
     */
    public function destroy(Article $article)
    {
        if (Auth::user()->level_id != 1) {
    abort(403, 'Anda tidak memiliki izin untuk mengakses halaman ini.');
}
        $article->delete();

        return redirect()->route('articles.index')
                         ->with('success', 'Artikel berhasil dihapus.');
    }
}