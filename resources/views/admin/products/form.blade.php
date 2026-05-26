@extends('layouts.admin')

@section('title', $product->exists ? 'Edit Produk' : 'Tambah Produk')
@section('page_title', $product->exists ? 'Edit Produk' : 'Tambah Produk')

@section('content')
    <form method="POST" action="{{ $product->exists ? route('admin.products.update', $product) : route('admin.products.store') }}" enctype="multipart/form-data" class="panel form-panel">
        @csrf
        @if ($product->exists)
            @method('PUT')
        @endif

        <div class="form-grid">
            <label>
                Nama Produk
                <input type="text" name="name" value="{{ old('name', $product->name) }}" required>
                @error('name') <small class="error">{{ $message }}</small> @enderror
            </label>
            <label>
                Kategori
                <input type="text" name="category" value="{{ old('category', $product->category ?: 'Olahan Singkong') }}" required>
                @error('category') <small class="error">{{ $message }}</small> @enderror
            </label>
            <label>
                Harga
                <input type="number" name="price" value="{{ old('price', $product->price ?? 0) }}" min="0" required>
                @error('price') <small class="error">{{ $message }}</small> @enderror
            </label>
            <label>
                Stok
                <input type="number" name="stock" value="{{ old('stock', $product->stock ?? 0) }}" min="0" required>
                @error('stock') <small class="error">{{ $message }}</small> @enderror
            </label>
        </div>

        <label>
            Deskripsi
            <textarea name="description" rows="6">{{ old('description', $product->description) }}</textarea>
            @error('description') <small class="error">{{ $message }}</small> @enderror
        </label>

        <label>
            Foto Produk
            <input type="file" name="image" accept="image/*">
            @error('image') <small class="error">{{ $message }}</small> @enderror
        </label>

        @if ($product->image_path)
            <img class="form-preview" src="{{ asset('storage/'.$product->image_path) }}" alt="{{ $product->name }}">
        @endif

        <div class="check-grid">
            <label class="check-row">
                <input type="checkbox" name="is_featured" value="1" @checked(old('is_featured', $product->is_featured))>
                <span>Tampilkan sebagai produk unggulan</span>
            </label>
            <label class="check-row">
                <input type="checkbox" name="is_published" value="1" @checked(old('is_published', $product->exists ? $product->is_published : true))>
                <span>Publikasikan produk</span>
            </label>
        </div>

        <div class="form-actions">
            <a href="{{ route('admin.products.index') }}" class="btn btn-outline">Batal</a>
            <button class="btn btn-dark" type="submit">Simpan Produk</button>
        </div>
    </form>
@endsection
