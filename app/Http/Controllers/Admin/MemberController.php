<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf; // <-- TAMBAHKAN BARIS INI

class MemberController extends Controller
{
    /**
     * Menampilkan form untuk menambah anggota baru.
     */
    public function create()
    {
        // Menampilkan file resources/views/admin/members/form.blade.php
        return view('admin.members.form');
    }

    /**
     * Menyimpan data anggota baru ke database SQLite.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'          => 'required|string|max:255',
            'business_name' => 'required|string|max:255',
            'phone_number'  => 'nullable|string|max:20',
        ]);

        Member::create($validatedData);

        return redirect()->route('admin.dashboard')->with('success', 'Anggota UMKM berhasil ditambahkan!');
    }

    /**
     * Menampilkan form edit dengan data anggota lama yang dipilih.
     */
    public function edit($id)
    {
        $member = Member::findOrFail($id);
        
        return view('admin.members.form', compact('member')); 
    }

    /**
     * Menyimpan perubahan data dari form edit ke database.
     */
    public function update(Request $request, $id)
    {
        $member = Member::findOrFail($id);

        $validatedData = $request->validate([
            'name'          => 'required|string|max:255',
            'business_name' => 'required|string|max:255',
            'phone_number'  => 'nullable|string|max:20',
            'is_active'     => 'sometimes|required|boolean',
        ]);

        $member->update($validatedData);

        return redirect()->route('admin.dashboard')->with('success', 'Data anggota UMKM berhasil diperbarui!');
    }

    /**
     * Menghapus data anggota dari database.
     */
    public function destroy($id)
    {
        $member = Member::findOrFail($id);
        $member->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Data anggota UMKM berhasil dihapus!');
    }
    public function downloadPdf()
    {
        // Ambil semua data anggota
        $members = Member::all(); 

        // Load view PDF dan lempar datanya
        $pdf = Pdf::loadView('admin.members.pdf', compact('members'));
        
        // Unduh file PDF
        return $pdf->download('Laporan_Resmi_Anggota_UMKM.pdf');
    }
}