@extends('layouts.admin')

{{-- Judul Halaman Dinamis --}}
@section('title', isset($member) ? 'Edit Anggota UMKM' : 'Tambah Anggota UMKM')
@section('page_title', isset($member) ? 'Edit Anggota UMKM' : 'Tambah Anggota UMKM Baru')

@section('content')
<div class="panel" style="max-width: 680px; margin: 3.5rem auto; background: #ffffff; padding: 40px; border-radius: 12px; box-shadow: 0 10px 25px -5px rgba(0,0,0,0.05), 0 8px 10px -6px rgba(0,0,0,0.05); border: 1px solid #e5e7eb;">
    
    <div style="margin-bottom: 36px; border-bottom: 1px solid #f3f4f6; padding-bottom: 20px;">
        <h3 style="margin: 0; font-size: 1.35rem; color: #1f2937; font-weight: 700; letter-spacing: -0.025em;">
            {{ isset($member) ? 'Formulir Perubahan Data' : 'Formulir Registrasi Anggota' }}
        </h3>
        <p style="margin: 6px 0 0 0; font-size: 0.875rem; color: #6b7280; line-height: 1.5;">
            Silakan isi rincian profil pelaku usaha UMKM untuk mempermudah pemetaan digital komoditas Desa Pengkol.
        </p>
    </div>
    
    @if ($errors->any())
        <div style="background-color: #fee2e2; border-left: 4px solid #ef4444; color: #991b1b; padding: 16px; border-radius: 8px; margin-bottom: 32px; font-size: 0.875rem;">
            <div style="font-weight: 600; margin-bottom: 6px;">Periksa kembali kolom isian berikut:</div>
            <ul style="margin: 0; padding-left: 18px; line-height: 1.5;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ isset($member) ? route('admin.members.update', $member->id) : route('admin.members.store') }}" method="POST">
        @csrf
        
        @if(isset($member))
            @method('PUT')
        @endif

        <div style="display: flex; flex-direction: column; gap: 28px;">
            
            <div>
                <label for="name" style="display: block; font-weight: 600; margin-bottom: 10px; color: #374151; font-size: 0.925rem;">
                    Nama Lengkap <span style="color: #ef4444;">*</span>
                </label>
                <input type="text" name="name" id="name" 
                       value="{{ old('name', $member->name ?? '') }}" 
                       placeholder="Contoh: Muhammad Nadhim Alim" 
                       style="width: 100%; padding: 12px 16px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 0.95rem; color: #1f2937; background-color: #f9fafb; transition: all 0.2s;" 
                       required>
            </div>

            <div>
                <label for="business_name" style="display: block; font-weight: 600; margin-bottom: 10px; color: #374151; font-size: 0.925rem;">
                    Nama Usaha / Merek <span style="color: #ef4444;">*</span>
                </label>
                <input type="text" name="business_name" id="business_name" 
                       value="{{ old('business_name', $member->business_name ?? '') }}" 
                       placeholder="Contoh: Asso Mandiri / Kripik Singkong" 
                       style="width: 100%; padding: 12px 16px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 0.95rem; color: #1f2937; background-color: #f9fafb; transition: all 0.2s;" 
                       required>
            </div>

            <div>
                <label for="phone_number" style="display: block; font-weight: 600; margin-bottom: 10px; color: #374151; font-size: 0.925rem;">
                    Nomor WhatsApp / No. HP
                </label>
                <input type="text" name="phone_number" id="phone_number" 
                       value="{{ old('phone_number', $member->phone_number ?? '') }}" 
                       placeholder="Contoh: 089508545071" 
                       style="width: 100%; padding: 12px 16px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 0.95rem; color: #1f2937; background-color: #f9fafb; transition: all 0.2s;">
            </div>

            @if(isset($member))
            <div>
                <label for="is_active" style="display: block; font-weight: 600; margin-bottom: 10px; color: #374151; font-size: 0.925rem;">
                    Status Keanggotaan
                </label>
                <select name="is_active" id="is_active" 
                        style="width: 100%; padding: 12px 16px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 0.95rem; color: #1f2937; background-color: #ffffff; cursor: pointer; transition: all 0.2s;">
                    <option value="1" {{ old('is_active', $member->is_active) == 1 ? 'selected' : '' }}>🟢 Aktif (Ditampilkan di Dashboard)</option>
                    <option value="0" {{ old('is_active', $member->is_active) == 0 ? 'selected' : '' }}>🔴 Non-Aktif (Diarsipkan)</option>
                </select>
            </div>
            @endif

        </div>

        <div style="display: flex; gap: 14px; justify-content: flex-end; margin-top: 44px; padding-top: 24px; border-top: 1px solid #f3f4f6;">
            <a href="{{ route('admin.dashboard') }}" 
               class="btn btn-light" 
               style="text-decoration: none; padding: 11px 24px; border: 1px solid #d1d5db; border-radius: 8px; color: #4b5563; font-weight: 600; font-size: 0.95rem; background-color: #ffffff; display: inline-flex; align-items: center; justify-content: center; transition: all 0.2s;">
                Batal
            </a>
            
            <button type="submit" 
                    class="btn btn-success" 
                    style="background-color: #10b981; color: #ffffff; border: none; padding: 11px 28px; border-radius: 8px; font-weight: 600; font-size: 0.95rem; cursor: pointer; box-shadow: 0 4px 6px -1px rgba(16, 185, 129, 0.2); transition: all 0.2s;">
                {{ isset($member) ? 'Perbarui Data' : 'Simpan Data' }}
            </button>
        </div>
    </form>
</div>

<style>
    form input:focus, form select:focus {
        outline: none !important;
        border-color: #10b981 !important;
        background-color: #ffffff !important;
        box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.15) !important;
    }
    form .btn:hover {
        opacity: 0.92;
        transform: translateY(-1px);
    }
    form .btn:active {
        transform: translateY(0);
    }
</style>
@endsection