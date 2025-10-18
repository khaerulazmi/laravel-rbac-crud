@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Tambah Artikel</h2>

    <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label>Judul</label>
        <input type="text" name="title" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Konten</label>
        <textarea name="content" class="form-control" rows="5" required></textarea>
    </div>

    <div class="mb-3">
        <label>Upload File</label>
        <input type="file" name="file" class="form-control">
    </div>

    <button type="submit" class="btn btn-success">Simpan</button>
</form>
</div>
@endsection