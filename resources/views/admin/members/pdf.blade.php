<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laporan Resmi Anggota UMKM</title>
    <style>
        body { font-family: sans-serif; font-size: 11px; color: #333; line-height: 1.4; }
        .header { text-align: center; margin-bottom: 30px; border-bottom: 2px solid #111827; padding-bottom: 10px; }
        .header h2 { margin: 0; padding: 0; color: #111827; font-size: 1.6rem; letter-spacing: 0.5px; }
        .header p { margin: 5px 0 0 0; color: #4b5563; font-size: 0.9rem; }
        
        table.data-table { width: 100%; border-collapse: collapse; margin-top: 10px; page-break-inside: auto; }
        table.data-table tr { page-break-inside: avoid; page-break-after: auto; }
        table.data-table th, table.data-table td { border: 1px solid #9ca3af; padding: 8px 10px; text-align: left; }
        table.data-table th { background-color: #f3f4f6; font-weight: bold; color: #1f2937; text-transform: uppercase; font-size: 10px; }
        
        .status-aktif { color: #0288d1; font-weight: bold; }
        .status-non { color: #ef4444; font-weight: bold; }

        /* Style Khusus Area Tanda Tangan */
        .ttd-container { width: 100%; margin-top: 50px; border: none; page-break-inside: avoid; }
        .ttd-container td { border: none; padding: 0; width: 50%; vertical-align: top; }
        .ttd-space { height: 75px; } /* Ruang kosong untuk tanda tangan manual */
    </style>
</head>
<body>

    <div class="header">
        <h2>LAPORAN RESMI ANGGOTA UMKM</h2>
        <p>Pemerintah Desa Pengkol - Generated pada: {{ now()->translatedFormat('d F Y') }}</p>
    </div>

    <table class="data-table">
        <thead>
            <tr>
                <th style="width: 5%; text-align: center;">No</th>
                <th>Nama Anggota</th>
                <th>Nama Usaha</th>
                <th>No. WhatsApp</th>
                <th style="width: 15%; text-align: center;">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($members as $key => $member)
                <tr>
                    <td style="text-align: center;">{{ $key + 1 }}</td>
                    <td><strong>{{ $member->name }}</strong></td>
                    <td>{{ $member->business_name }}</td>
                    <td>{{ $member->phone_number ?? '-' }}</td>
                    <td style="text-align: center;">
                        <span class="{{ $member->is_active ? 'status-aktif' : 'status-non' }}">
                            {{ $member->is_active ? 'Aktif' : 'Non-Aktif' }}
                        </span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <table class="ttd-container">
        <tr>
            <td style="text-align: center;">
                <p style="margin-bottom: 0;">Mengetahui,</p>
                <p style="margin-top: 0; font-weight: bold;">Ketua Anggota UMKM</p>
                <div class="ttd-space"></div>
                <p style="text-decoration: underline; font-weight: bold; margin-bottom: 2px;">( _______________________ )</p>
                <p style="margin-top: 0; color: #4b5563; font-size: 10px;">NIP/NIK. .................................</p>
            </td>

            <td style="text-align: center;">
                <p style="margin-bottom: 0;">Pengkol, {{ now()->translatedFormat('d F Y') }}</p>
                <p style="margin-top: 0; font-weight: bold;">Kepala Desa Pengkol</p>
                <div class="ttd-space"></div>
                <p style="text-decoration: underline; font-weight: bold; margin-bottom: 2px;">( _______________________ )</p>
                <p style="margin-top: 0; color: #4b5563; font-size: 10px;">NIP/NIK. .................................</p>
            </td>
        </tr>
    </table>

</body>
</html>