@extends('layouts.admin')

@section('title', 'Kelola Artikel')
@section('page_title', 'Kelola Artikel')

@section('content')
    <div class="panel">
        <div class="panel-head">
            <h2>Daftar Artikel</h2>
            <a href="{{ route('admin.articles.create') }}" class="btn btn-dark">Tambah Artikel</a>
        </div>
        <div class="table-wrap">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Terbit</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($articles as $article)
                        <tr>
                            <td><strong>{{ $article->title }}</strong></td>
                            <td>{{ optional($article->published_at)->format('d M Y') ?? '-' }}</td>
                            <td><span class="status {{ $article->is_published ? 'ok' : 'draft' }}">{{ $article->is_published ? 'Publik' : 'Draft' }}</span></td>
                            <td class="actions">
                                <a href="{{ route('admin.articles.edit', $article) }}">Edit</a>
                                <form method="POST" action="{{ route('admin.articles.destroy', $article) }}" onsubmit="return confirm('Hapus artikel ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="4">Belum ada artikel.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="pagination-wrap">{{ $articles->links() }}</div>
    </div>
@endsection
