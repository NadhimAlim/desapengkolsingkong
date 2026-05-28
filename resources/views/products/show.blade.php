@extends('layouts.app')

@section('title', $product->name)

@section('content')
    <section class="detail-section" style="background-color: #fafafa; padding: 80px 0; font-family: system-ui, -apple-system, sans-serif;">
        <div class="container detail-grid" style="max-width: 1100px; margin: 0 auto; padding: 0 24px; display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 50px; align-items: start;">
            
            <div class="detail-media" style="background-color: #ffffff; border-radius: 16px; border: 1px solid #e5e7eb; padding: 16px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.02); position: sticky; top: 100px;">
                @if ($product->image_path)
                    <img src="{{ asset('storage/'.$product->image_path) }}" alt="{{ $product->name }}" style="width: 100%; height: auto; max-height: 450px; object-fit: cover; border-radius: 12px;">
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

                <div style="margin-top: 16px;">
                    <a href="https://tokopedia.com" 
                       target="_blank"
                       class="btn btn-tokopedia" 
                       style="background-color: #03ac0e; color: #ffffff; text-decoration: none; font-weight: 700; font-size: 1.05rem; display: flex; align-items: center; justify-content: center; gap: 10px; padding: 16px 32px; border-radius: 10px; box-shadow: 0 10px 15px -3px rgba(3, 172, 14, 0.25); transition: all 0.2s; width: 100%; box-sizing: border-box; text-align: center;"
                       onmouseover="this.style.backgroundColor='#028e0b'; this.style.transform='translateY(-2px)';" 
                       onmouseout="this.style.backgroundColor='#03ac0e'; this.style.transform='translateY(0)';">
                       
                       <svg style="width: 22px; height: 22px; fill: none; stroke: currentColor; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round;" viewBox="0 0 24 24">
                           <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                           <line x1="3" y1="6" x2="21" y2="6"></line>
                           <path d="M16 10a4 4 0 0 1-8 0"></path>
                       </svg>
                       Beli di Tokopedia
                    </a>
                </div>
                
            </div>
        </div>
    </section>
@endsection