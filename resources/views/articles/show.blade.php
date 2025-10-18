@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>{{ $article->title }}</h2>
    <p>{{ $article->content }}</p>

    @if($article->file)
    <img src="{{ asset('storage/uploads/' . $article->file) }}" alt="{{ $article->title }}" class="img-fluid">
    @endif

    <a href="{{ route('articles.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection