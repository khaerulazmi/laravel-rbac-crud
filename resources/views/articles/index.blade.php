@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Daftar Artikel</h2>

    {{-- 🔒 Tampilkan tombol tambah hanya jika admin --}}
    @if (auth()->user()->level_id == 1)
        <a href="{{ route('articles.create') }}" class="btn btn-primary mb-3">+ Tambah Artikel</a>
    @endif

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Konten</th>
                <th>File</th>
               @if(auth()->user()->level_id == 1)
                <th>Aksi</th>
            @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($articles as $index => $article)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $article->title }}</td>
                <td>{{ Str::limit($article->content, 100) }}</td>
                <td>

                    @if($article->file)
                    <img src="{{ asset('storage/uploads/' . $article->file) }}" width="150" alt="Gambar Artikel">
                    @endif 
                </td>
                 <td>
                    {{-- 🔒 Hanya admin yang bisa edit/hapus --}}
                    @if(auth()->user()->level_id == 1)
                        <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin hapus?')">Hapus</button>
                        </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection