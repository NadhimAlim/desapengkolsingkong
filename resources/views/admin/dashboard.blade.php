@extends('layouts.admin')

@section('title', 'Dashboard Admin')
@section('page_title', 'Dashboard')

@section('content')
    <section class="metric-grid">
        <div class="metric-card" style="border-left: 4px solid #10b981;">
            <span>Total Pengunjung</span>
            <strong>{{ number_format($totalVisitors, 0, ',', '.') }}</strong>
        </div>

        <div class="metric-card">
            <span>Total Porduk</span>
            <strong>{{ $productCount }}</strong>
        </div>

        <div class="metric-card">
            <span>Produk Publik</span>
            <strong>{{ $publishedProductCount }}</strong>
        </div>

        <div class="metric-card">
            <span>Total Artikel</span>
            <strong>{{ $articleCount }}</strong>
        </div>



        <div class="metric-card" style="border-left: 4px solid #3b82f6;">
            <span>Pengunjung Hari Ini</span>
            <strong>{{ number_format($todayVisitors, 0, ',', '.') }}</strong>
        </div>

        <div class="metric-card" style="border-left: 4px solid #f59e0b;">
            <span>Pengunjung Bulan Ini</span>
            <strong>{{ number_format($monthVisitors, 0, ',', '.') }}</strong>
        </div>

        <div class="metric-card" style="border-left: 4px solid #10b981;">
            <span>Total Pengunjung</span>
            <strong>{{ number_format($totalVisitors, 0, ',', '.') }}</strong>
        </div>
    </section>

    <section class="admin-grid">
        <div class="panel">
            <div class="panel-head">
                <h2>Produk Terbaru</h2>
                <a href="{{ route('admin.products.create') }}" class="btn btn-dark btn-sm">Tambah Produk</a>
            </div>
            <div class="simple-list">
                @forelse ($recentProducts as $product)
                    <div>
                        <strong>{{ $product->name }}</strong>
                        <span>Rp{{ number_format($product->price, 0, ',', '.') }} -
                            {{ $product->is_published ? 'Publik' : 'Draft' }}</span>
                    </div>
                @empty
                    <p class="muted-text">Belum ada produk.</p>
                @endforelse
            </div>
        </div>

        <div class="panel">
            <div class="panel-head">
                <h2>Artikel Terbaru</h2>
                <a href="{{ route('admin.articles.create') }}" class="btn btn-dark btn-sm">Tambah Artikel</a>
            </div>
            <div class="simple-list">
                @forelse ($recentArticles as $article)
                    <div>
                        <strong>{{ $article->title }}</strong>
                        <span>{{ $article->is_published ? 'Publik' : 'Draft' }} -
                            {{ $article->updated_at->format('d M Y') }}</span>
                    </div>
                @empty
                    <p class="muted-text">Belum ada artikel.</p>
                @endforelse
            </div>
        </div>

        <div class="panel" style="grid-column: span 2; margin-top: 28px; background: #ffffff; padding: 24px; border-radius: 10px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05); border: 1px solid #e5e7eb;">
    
    <div class="panel-head" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; padding-bottom: 14px; border-bottom: 1px solid #f3f4f6;">
        <h2 style="margin: 0; font-size: 1.2rem; color: #1f2937; font-weight: 700;">Daftar Anggota UMKM</h2>
        <a href="{{ route('admin.members.create') }}" class="btn btn-dark btn-sm"
           style="background-color: #10b981; border: none; color: white; text-decoration: none; padding: 8px 16px; border-radius: 6px; font-weight: 600; font-size: 0.85rem; display: inline-flex; align-items: center; transition: background-color 0.2s;">
           Tambah Anggota
        </a>
    </div>

    <div class="simple-list" style="display: flex; flex-direction: column; gap: 4px;">
        @forelse ($recentMembers ?? [] as $member)
            <div style="display: flex; justify-content: space-between; align-items: center; padding: 14px 8px; border-bottom: 1px solid #f3f4f6; transition: background-color 0.2s;">
                
                <div>
                    <strong style="display: block; color: #1f2937; font-size: 1.05rem; margin-bottom: 4px;">{{ $member->name }}</strong>
                    <span class="muted-text" style="font-size: 0.85rem; color: #6b7280;">
                        Nama Usaha: <span style="color: #4b5563; font-weight: 600;">{{ $member->business_name }}</span>
                        @if ($member->phone_number)
                            <span style="color: #d1d5db; margin: 0 6px;">|</span> WA: <span style="color: #10b981; font-weight: 600;">{{ $member->phone_number }}</span>
                        @endif
                    </span>
                </div>

                <div style="display: flex; gap: 10px; align-items: center;">
                    <span class="badge"
                          style="padding: 6px 12px; border-radius: 6px; font-size: 0.8rem; font-weight: 600; background-color: {{ $member->is_active ? '#e1f5fe' : '#fee2e2' }}; color: {{ $member->is_active ? '#0288d1' : '#ef4444' }};">
                        {{ $member->is_active ? 'Aktif' : 'Non-Aktif' }}
                    </span>

                    <a href="{{ route('admin.members.edit', $member->id) }}" 
                       style="background-color: #f59e0b; color: white; text-decoration: none; padding: 6px 14px; border-radius: 6px; font-size: 0.85rem; font-weight: 600; transition: opacity 0.2s; display: inline-block;">
                        Edit
                    </a>

                    <form action="{{ route('admin.members.destroy', $member->id) }}" method="POST"
                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus anggota ini?')" style="margin: 0;">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                style="background-color: #ef4444; color: white; border: none; padding: 6px 14px; border-radius: 6px; font-size: 0.85rem; cursor: pointer; font-weight: 600; transition: opacity 0.2s;">
                                Hapus
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <div style="padding: 20px 0; text-align: center; color: #9ca3af; font-size: 0.9rem;">
                Belum ada data anggota UMKM yang terdaftar.
            </div>
        @endforelse
    </div>

    @if ($recentMembers->hasPages())
        <div style="margin-top: 24px; display: flex; justify-content: space-between; align-items: center; padding-top: 18px; border-top: 1px solid #f3f4f6;">
            <div style="font-size: 0.875rem; color: #6b7280;">
                Menampilkan <span style="font-weight: 600; color: #1f2937;">{{ $recentMembers->firstItem() }}</span> - <span style="font-weight: 600; color: #1f2937;">{{ $recentMembers->lastItem() }}</span> dari <span style="font-weight: 600; color: #1f2937;">{{ $recentMembers->total() }}</span> Anggota
            </div>
            
            <div style="display: flex; gap: 8px;">
                {{-- Tombol Sebelumnya --}}
                @if ($recentMembers->onFirstPage())
                    <span style="padding: 8px 14px; background-color: #f3f4f6; color: #9ca3af; border-radius: 6px; font-size: 0.85rem; font-weight: 600; cursor: not-allowed; border: 1px solid #e5e7eb;">Sebelumnya</span>
                @else
                    <a href="{{ $recentMembers->previousPageUrl() }}" style="padding: 8px 14px; background-color: #ffffff; color: #374151; border: 1px solid #d1d5db; border-radius: 6px; font-size: 0.85rem; font-weight: 600; text-decoration: none; transition: background-color 0.2s;">Sebelumnya</a>
                @endif

                {{-- Tombol Selanjutnya --}}
                @if ($recentMembers->hasMorePages())
                    <a href="{{ $recentMembers->nextPageUrl() }}" style="padding: 8px 14px; background-color: #ffffff; color: #374151; border: 1px solid #d1d5db; border-radius: 6px; font-size: 0.85rem; font-weight: 600; text-decoration: none; transition: background-color 0.2s;">Selanjutnya</a>
                @else
                    <span style="padding: 8px 14px; background-color: #f3f4f6; color: #9ca3af; border-radius: 6px; font-size: 0.85rem; font-weight: 600; cursor: not-allowed; border: 1px solid #e5e7eb;">Selanjutnya</span>
                @endif
            </div>
        </div>
    @endif

</div>
    </section>
@endsection
