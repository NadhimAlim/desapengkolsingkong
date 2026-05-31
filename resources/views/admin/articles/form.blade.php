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
            <input type="text" id="article_title" name="title" value="{{ old('title', $article->title) }}" required>
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

        <hr style="border: 0; border-top: 1px solid #e2e8f0; margin: 32px 0;">

        <div class="seo-section" style="background: #f8fafc; padding: 24px; border-radius: 12px; border: 1px solid #e2e8f0; margin-bottom: 24px;">
            <h3 style="margin-top: 0; margin-bottom: 8px; color: #0f172a; font-size: 1.2rem; display: flex; align-items: center; gap: 8px;">
                <span>🔍</span> Google SEO Optimization
            </h3>
            <p style="color: #64748b; font-size: 0.85rem; margin-bottom: 20px;">Optimalkan metadata di bawah ini agar artikel Anda mudah ditemukan oleh calon pembeli di pencarian Google.</p>

            <div class="google-preview" style="background: #ffffff; padding: 16px; border-radius: 8px; border: 1px solid #cbd5e1; margin-bottom: 24px; font-family: Arial, sans-serif;">
                <span style="color: #202124; font-size: 12px; display: block; margin-bottom: 2px;">Desa Pengkol › Artikel</span>
                <a href="#" id="preview_link" style="color: #1a0dab; font-size: 19px; text-decoration: none; font-weight: normal; display: block; margin-bottom: 4px; line-height: 1.3; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                    {{ old('meta_title', $article->meta_title ?? 'Judul Artikel Akan Muncul Di Sini...') }}
                </a>
                <p id="preview_desc" style="color: #4d5156; font-size: 14px; margin: 0; line-height: 1.4; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                    {{ old('meta_description', $article->meta_description ?? 'Tulis deskripsi SEO yang memikat agar pengguna Google tertarik mengklik artikel ini saat mencarinya di internet...') }}
                </p>
            </div>

            <label style="display: block; margin-bottom: 16px;">
                <div style="display: flex; justify-content: space-between;">
                    <span>Meta Title (Judul di Google)</span>
                    <small style="color: #64748b;"><span id="title_count">0</span>/60 karakter</small>
                </div>
                <input type="text" id="meta_title" name="meta_title" value="{{ old('meta_title', $article->meta_title) }}" placeholder="Contoh: Jual Keripik Singkong Premium Desa Pengkol Murah & Renyah" style="width: 100%; margin-top: 4px;">
                <small style="color: #64748b; font-size: 0.8rem; display: block; margin-top: 4px;">Disarankan maksimal 60 karakter agar tidak terpotong oleh Google.</small>
                @error('meta_title') <small class="error">{{ $message }}</small> @enderror
            </label>

            <label style="display: block; margin-bottom: 16px;">
                <div style="display: flex; justify-content: space-between;">
                    <span>Meta Description (Deskripsi di Google)</span>
                    <small style="color: #64748b;"><span id="desc_count">0</span>/160 karakter</small>
                </div>
                <textarea id="meta_description" name="meta_description" rows="3" placeholder="Contoh: Temukan kelezatan camilan keripik singkong khas Desa Pengkol yang diolah secara alami, higienis, bebas pengawet, dan siap kirim ke seluruh Indonesia." style="width: 100%; margin-top: 4px;">{{ old('meta_description', $article->meta_description) }}</textarea>
                <small style="color: #64748b; font-size: 0.8rem; display: block; margin-top: 4px;">Disarankan antara 120-160 karakter agar penjelasan terlihat padat dan informatif di Google.</small>
                @error('meta_description') <small class="error">{{ $message }}</small> @enderror
            </label>

            <label style="display: block; margin-bottom: 0;">
                <span>Keywords (Kata Kunci Terkait)</span>
                <input type="text" name="meta_keywords" value="{{ old('meta_keywords', $article->meta_keywords) }}" placeholder="Contoh: keripik singkong pengkol, camilan desa pengkol, olahan singkong sehat" style="width: 100%; margin-top: 4px;">
                <small style="color: #64748b; font-size: 0.8rem; display: block; margin-top: 4px;">Pisahkan antar kata kunci menggunakan tanda koma (,).</small>
                @error('meta_keywords') <small class="error">{{ $message }}</small> @enderror
            </label>
        </div>

        <div class="form-actions">
            <a href="{{ route('admin.articles.index') }}" class="btn btn-outline">Batal</a>
            <button class="btn btn-dark" type="submit">Simpan Artikel</button>
        </div>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const articleTitle = document.getElementById('article_title');
            const metaTitle = document.getElementById('meta_title');
            const metaDesc = document.getElementById('meta_description');
            
            const previewLink = document.getElementById('preview_link');
            const previewDesc = document.getElementById('preview_desc');
            
            const titleCount = document.getElementById('title_count');
            const descCount = document.getElementById('desc_count');

            function updateSEO() {
                // Update Title & Counter
                let titleText = metaTitle.value.trim();
                if(!titleText) titleText = articleTitle.value.trim() || 'Judul Artikel Akan Muncul Di Sini...';
                previewLink.textContent = titleText;
                titleCount.textContent = metaTitle.value.length;
                
                // Beri warna indikator jika melebihi batas ideal Google
                titleCount.style.color = metaTitle.value.length > 60 ? '#ef4444' : '#64748b';

                // Update Description & Counter
                let descText = metaDesc.value.trim();
                if(!descText) descText = 'Tulis deskripsi SEO yang memikat agar pengguna Google tertarik mengklik artikel ini saat mencarinya di internet...';
                previewDesc.textContent = descText;
                descCount.textContent = metaDesc.value.length;
                
                // Beri warna indikator deskripsi jika melebihi batas ideal Google
                descCount.style.color = (metaDesc.value.length > 160 || metaDesc.value.length < 120) && metaDesc.value.length > 0 ? '#f59e0b' : '#64748b';
            }

            // Jalankan fungsi saat admin mengetik
            metaTitle.addEventListener('input', updateSEO);
            metaDesc.addEventListener('input', updateSEO);
            articleTitle.addEventListener('input', function() {
                if(!metaTitle.value) {
                    previewLink.textContent = this.value || 'Judul Artikel Akan Muncul Di Sini...';
                }
            });

            // Jalankan sekali saat halaman selesai dimuat (Mode Edit)
            updateSEO();
        });
    </script>
@endsection