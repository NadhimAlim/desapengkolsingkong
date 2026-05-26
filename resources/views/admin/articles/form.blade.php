@extends('layouts.admin')

@section('title', $article->exists ? 'Edit Artikel' : 'Tambah Artikel')
@section('page_title', $article->exists ? 'Edit Artikel' : 'Tambah Artikel')

@section('content')
    <form method="POST" action="{{ $article->exists ? route('admin.articles.update', $article) : route('admin.articles.store') }}" enctype="multipart/form-data" class="panel form-panel">
        @csrf
        @if ($article->exists)
            @method('PUT')
        @endif

        <label>
            Judul Artikel
            <input type="text" name="title" value="{{ old('title', $article->title) }}" required>
            @error('title') <small class="error">{{ $message }}</small> @enderror
        </label>

        <label>
            Ringkasan
            <textarea name="excerpt" rows="3">{{ old('excerpt', $article->excerpt) }}</textarea>
            @error('excerpt') <small class="error">{{ $message }}</small> @enderror
        </label>

        <label>
            Isi Artikel
            <textarea name="content" rows="12" required>{{ old('content', $article->content) }}</textarea>
            @error('content') <small class="error">{{ $message }}</small> @enderror
        </label>

        <label>
            Gambar Artikel
            <input type="file" name="image" accept="image/*">
            @error('image') <small class="error">{{ $message }}</small> @enderror
        </label>

        @if ($article->image_path)
            <img class="form-preview" src="{{ asset('storage/'.$article->image_path) }}" alt="{{ $article->title }}">
        @endif

        <label class="check-row">
            <input type="checkbox" name="is_published" value="1" @checked(old('is_published', $article->exists ? $article->is_published : true))>
            <span>Publikasikan artikel</span>
        </label>

        <div class="form-actions">
            <a href="{{ route('admin.articles.index') }}" class="btn btn-outline">Batal</a>
            <button class="btn btn-dark" type="submit">Simpan Artikel</button>
        </div>
    </form>
@endsection
