@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-dark">📚 Daftar Artikel</h2>

        @if (auth()->user()->level_id == 1)
            <a href="{{ route('articles.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg me-1"></i> Tambah Artikel
            </a>
        @endif
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Konten</th>
                        <th>File</th>
                        @if(auth()->user()->level_id == 1)
                            <th class="text-center">Aksi</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @forelse ($articles as $index => $article)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td class="fw-semibold">{{ $article->title }}</td>
                            <td>{{ Str::limit($article->content, 100) }}</td>
                            <td>
                                @if($article->file)
                                    <img src="{{ asset('storage/uploads/' . $article->file) }}" 
                                         class="img-thumbnail" width="120" alt="Gambar Artikel">
                                @else
                                    <span class="text-muted fst-italic">Tidak ada gambar</span>
                                @endif
                            </td>
                            @if(auth()->user()->level_id == 1)
                                <td class="text-center">
                                    <a href="{{ route('articles.edit', $article->id) }}" 
                                       class="btn btn-sm btn-warning me-1">
                                       <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <form action="{{ route('articles.destroy', $article->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                onclick="return confirm('Yakin ingin menghapus artikel ini?')" 
                                                class="btn btn-sm btn-danger">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            @endif
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">Belum ada artikel yang tersedia.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
