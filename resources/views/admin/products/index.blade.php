@extends('layouts.admin')

@section('title', 'Kelola Produk')
@section('page_title', 'Kelola Produk')

@section('content')
    <div class="panel">
        <div class="panel-head">
            <h2>Daftar Produk</h2>
            <a href="{{ route('admin.products.create') }}" class="btn btn-dark">Tambah Produk</a>
        </div>
        <div class="table-wrap">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Produk</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                        <tr>
                            <td>
                                <div class="table-title">
                                    @if ($product->image_path)
                                        <img src="{{ asset('storage/'.$product->image_path) }}" alt="{{ $product->name }}">
                                    @endif
                                    <strong>{{ $product->name }}</strong>
                                </div>
                            </td>
                            <td>{{ $product->category }}</td>
                            <td>Rp{{ number_format($product->price, 0, ',', '.') }}</td>
                            <td>{{ $product->stock }}</td>
                            <td>
                                <span class="status {{ $product->is_published ? 'ok' : 'draft' }}">
                                    {{ $product->is_published ? 'Publik' : 'Draft' }}
                                </span>
                            </td>
                            <td class="actions">
                                <a href="{{ route('admin.products.edit', $product) }}">Edit</a>
                                <form method="POST" action="{{ route('admin.products.destroy', $product) }}" onsubmit="return confirm('Hapus produk ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" style="text-align: center; padding: 20px; color: #6b7280;">Belum ada produk.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="pagination-wrap" style="margin-top: 20px; display: flex; justify-content: center;">
            {{ $products->links() }}
        </div>
    </div>
@endsection