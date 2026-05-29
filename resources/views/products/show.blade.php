@extends('layouts.app')

@section('title', $product->name)

@section('content')
    <style>
        /* Grid untuk layout tombol aksi */
        .action-buttons-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
            width: 100%;
        }

        /* --- STYLE BARU UNTUK MODAL TRANSAKSI WEB --- */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(15, 23, 42, 0.6);
            backdrop-filter: blur(4px);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            opacity: 0;
            pointer-events: none;
            transition: all 0.3s ease;
        }
        .modal-overlay.active {
            opacity: 1;
            pointer-events: auto;
        }
        .transaction-modal {
            background: #ffffff;
            width: 100%;
            max-width: 480px;
            border-radius: 16px;
            box-shadow: 0 20px 25px -5px rgba(0,0,0,0.1), 0 10px 10px -5px rgba(0,0,0,0.04);
            overflow: hidden;
            transform: scale(0.9);
            transition: all 0.3s ease;
        }
        .modal-overlay.active .transaction-modal {
            transform: scale(1);
        }
        .modal-header {
            background: #1e293b;
            color: white;
            padding: 18px 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .modal-header h3 { margin: 0; font-size: 1.15rem; font-weight: 700; }
        .close-modal { background: none; border: none; color: #94a3b8; font-size: 1.5rem; cursor: pointer; transition: color 0.2s; }
        .close-modal:hover { color: white; }
        .modal-body { padding: 24px; }
        .form-group { margin-bottom: 16px; display: flex; flex-direction: column; gap: 6px; }
        .form-group label { font-size: 0.85rem; font-weight: 700; color: #4b5563; text-transform: uppercase; }
        .form-group input, .form-group textarea {
            padding: 10px 14px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 0.95rem; font-family: inherit;
        }
        .form-group input:focus, .form-group textarea:focus { border-color: #1e293b; outline: none; }
        .btn-submit-order {
            background: #1e293b; color: white; border: none; width: 100%; padding: 14px; font-weight: 700; border-radius: 8px; cursor: pointer; transition: background 0.2s;
        }
        .btn-submit-order:hover { background: #0f172a; }

        /* Ketika dibuka di HP / Layar di bawah 768px */
        @media (max-width: 768px) {
            .detail-grid {
                grid-template-columns: 1fr !important;
                gap: 24px !important;
                padding: 0 16px !important;
            }
            .detail-section { padding: 40px 0 !important; }
            .detail-media { position: static !important; padding: 10px !important; }
            .image-placeholder.large { height: 260px !important; }
            .detail-price { font-size: 1.8rem !important; }
            .action-buttons-grid {
                grid-template-columns: 1fr !important;
                gap: 10px !important;
            }
        }
    </style>

    <section class="detail-section" style="background-color: #fafafa; padding: 80px 0; font-family: system-ui, -apple-system, sans-serif;">
        <div class="container detail-grid" style="max-width: 1100px; margin: 0 auto; padding: 0 24px; display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 50px; align-items: start;">
            
            <div class="detail-media" style="background-color: #ffffff; border-radius: 16px; border: 1px solid #e5e7eb; padding: 16px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.02); position: sticky; top: 100px;">
                @if ($product->image_path)
                    <img src="{{ asset('storage/'.$product->image_path) }}" alt="{{ $product->name }}" style="width: 100%; height: auto; max-height: 450px; object-fit: cover; border-radius: 12px; display: block;">
                @else
                    <div class="image-placeholder large" style="width: 100%; height: 350px; background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%); border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                        <span style="font-size: 3.5rem; font-weight: 800; color: #94a3b8; letter-spacing: 2px;">{{ strtoupper(substr($product->name, 0, 2)) }}</span>
                    </div>
                @endif
            </div>
            
            <div class="detail-copy" style="display: flex; flex-direction: column; gap: 24px;">
                <div>
                    <span class="pill" style="background-color: #e8f5e9; color: #1b5e20; font-size: 0.8rem; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; padding: 6px 14px; border-radius: 50px; display: inline-block;">
                        🍃 {{ $product->category ?? 'Olahan Singkong' }}
                    </span>
                </div>

                <h1 style="font-size: clamp(1.8rem, 3vw, 2.6rem); color: #111827; font-weight: 800; line-height: 1.2; margin: 0; letter-spacing: -0.5px;">
                    {{ $product->name }}
                </h1>

                <div class="detail-price" style="font-size: 2.2rem; color: #16a34a; font-weight: 800; letter-spacing: -1px; border-bottom: 1px solid #f3f4f6; padding-bottom: 16px;">
                    Rp{{ number_format($product->price, 0, ',', '.') }}
                </div>

                <div style="display: flex; align-items: center; gap: 12px; margin-top: -8px;">
                    @if($product->stock > 0)
                        <span style="background-color: #dcfce7; color: #15803d; font-size: 0.8rem; font-weight: 600; padding: 4px 10px; border-radius: 6px;">Tersedia</span>
                        <div class="detail-stock" style="color: #4b5563; font-size: 0.95rem; font-weight: 500;">Stok: <strong style="color: #111827;">{{ $product->stock }} pcs</strong></div>
                    @else
                        <span style="background-color: #fee2e2; color: #b91c1c; font-size: 0.8rem; font-weight: 600; padding: 4px 10px; border-radius: 6px;">Habis</span>
                        <div class="detail-stock" style="color: #9ca3af; font-size: 0.95rem; font-weight: 500;">Stok tidak tersedia</div>
                    @endif
                </div>

                <div style="display: flex; flex-direction: column; gap: 8px; margin-top: 8px;">
                    <h3 style="font-size: 1rem; color: #111827; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; margin: 0;">Deskripsi Produk</h3>
                    <p style="color: #4b5563; font-size: 1.05rem; line-height: 1.7; margin: 0; text-align: justify;">
                        {{ $product->description }}
                    </p>
                </div>

                <div style="margin-top: 16px; display: flex; flex-direction: column; gap: 12px;">
                    <h4 style="font-size: 0.9rem; color: #4b5563; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; margin: 0;">Opsi Pembelian:</h4>
                    
                    <div class="action-buttons-grid">
                        <a href="https://tokopedia.com" target="_blank" style="background-color: #03ac0e; color: #ffffff; text-decoration: none; font-weight: 700; font-size: 0.95rem; display: flex; align-items: center; justify-content: center; gap: 8px; padding: 14px 16px; border-radius: 10px; box-shadow: 0 4px 6px -1px rgba(3, 172, 14, 0.15); transition: all 0.2s; box-sizing: border-box; text-align: center;" onmouseover="this.style.backgroundColor='#028e0b'; this.style.transform='translateY(-2px)';" onmouseout="this.style.backgroundColor='#03ac0e'; this.style.transform='translateY(0)';">
                            <svg style="width: 18px; height: 18px; fill: none; stroke: currentColor; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round;" viewBox="0 0 24 24"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                            Tokopedia
                        </a>

                        <a href="https://wa.me/6281234567890?text=Halo%20Admin%20UMKM%20Desa%20Pengkol,%20saya%20ingin%20membeli%20produk%20{{ urlencode($product->name) }}" target="_blank" style="background-color: #25d366; color: #ffffff; text-decoration: none; font-weight: 700; font-size: 0.95rem; display: flex; align-items: center; justify-content: center; gap: 8px; padding: 14px 16px; border-radius: 10px; box-shadow: 0 4px 6px -1px rgba(37, 211, 102, 0.15); transition: all 0.2s; box-sizing: border-box; text-align: center;" onmouseover="this.style.backgroundColor='#20ba5a'; this.style.transform='translateY(-2px)';" onmouseout="this.style.backgroundColor='#25d366'; this.style.transform='translateY(0)';">
                            <svg style="width: 18px; height: 18px; fill: currentColor;" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L0 24l6.335-1.662c1.746.953 3.71 1.454 5.709 1.455h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                            WhatsApp
                        </a>

                        <button type="button" onclick="openTransactionModal()" style="background-color: #1e293b; color: #ffffff; border: none; font-weight: 700; font-size: 0.95rem; display: flex; align-items: center; justify-content: center; gap: 8px; padding: 14px 16px; border-radius: 10px; box-shadow: 0 4px 6px -1px rgba(30, 41, 59, 0.15); transition: all 0.2s; box-sizing: border-box; text-align: center; cursor: pointer;" onmouseover="this.style.backgroundColor='#0f172a'; this.style.transform='translateY(-2px)';" onmouseout="this.style.backgroundColor='#1e293b'; this.style.transform='translateY(0)';">
                            <svg style="width: 18px; height: 18px; fill: none; stroke: currentColor; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round;" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
                            Beli via Web
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div id="orderModal" class="modal-overlay" onclick="closeTransactionModalOnOverlay(event)">
        <div class="transaction-modal">
            <div class="modal-header">
                <h3>Formulir Pembelian Langsung</h3>
                <button type="button" class="close-modal" onclick="closeTransactionModal()">&times;</button>
            </div>
            <form action="{{ route('products.order', $product->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <p style="margin: 0 0 16px 0; font-size: 0.9rem; color: #6b7280;">Anda membeli: <strong style="color: #111827;">{{ $product->name }}</strong></p>
                    
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" name="customer_name" required placeholder="Masukkan nama Anda">
                    </div>

                    <div class="form-group">
                        <label>Nomor WhatsApp (Aktif)</label>
                        <input type="tel" name="customer_phone" required placeholder="Contoh: 081234567xxx">
                    </div>

                    <div class="form-group">
                        <label>Jumlah Pesanan (pcs)</label>
                        <input type="number" name="quantity" min="1" value="1" required>
                    </div>

                    <div class="form-group">
                        <label>Alamat Lengkap Pengiriman</label>
                        <textarea name="address" rows="3" required placeholder="Nama jalan, RT/RW, Dusun/Desa"></textarea>
                    </div>

                    <button type="submit" class="btn-submit-order" style="margin-top: 10px;">Kirim Pesanan Sekarang</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openTransactionModal() {
            document.getElementById('orderModal').classList.add('active');
        }
        function closeTransactionModal() {
            document.getElementById('orderModal').classList.remove('active');
        }
        function closeTransactionModalOnOverlay(e) {
            if (e.target.id === 'orderModal') {
                closeTransactionModal();
            }
        }
    </script>
@endsection