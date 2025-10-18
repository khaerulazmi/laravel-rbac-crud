@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Edit Artikel</h2>

    <form action="{{ route('articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="title" class="form-control" value="{{ $article->title }}" required>
        </div>

        <div class="mb-3">
            <label>Konten</label>
            <textarea name="content" class="form-control" rows="5" required>{{ $article->content }}</textarea>
        </div>

        <div class="mb-3">
            <label>File Saat Ini</label><br>
            @if ($article->file_path)
                <a href="{{ asset('storage/' . $article->file_path) }}" target="_blank">Lihat File</a>
            @else
                <p>Tidak ada file</p>
            @endif
        </div>

        <div class="mb-3">
            <label>Ganti File</label>
            <input type="file" name="file" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('articles.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection