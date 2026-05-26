@extends('layouts.app')

@section('content')
    <section class="hero-section py-5" style="background-color: #fdfbf7;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <span class="badge bg-success-subtle text-success mb-3 px-3 py-2 rounded-pill">100% Lokal</span>
                    <h1 class="display-4 fw-bold text-success mb-3">Keripik Singkong <br><span style="color: #b5651d;">Renyah, Gurih, Alami</span></h1>
                    <p class="text-muted lead mb-4">UMKM singkong keripik yang menghadirkan camilan berkualitas dari singkong pilihan dengan rasa khas dan proses higienis.</p>
                    <a href="#" class="btn btn-success btn-lg rounded-pill px-4">Kenali Kami Lebih Dekat &rarr;</a>
                </div>
                <div class="col-lg-6 text-center mt-4 mt-lg-0">
                    <img src="{{ asset('img/hero-image.png') }}" alt="Keripik Singkong" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </section>

    <section class="about-section py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-5">
                    <img src="{{ asset('img/singkong-mentah.png') }}" alt="Profil UMKM" class="img-fluid rounded shadow">
                </div>
                <div class="col-md-7 ps-lg-5 mt-4 mt-md-0">
                    <span class="text-success fw-bold small text-uppercase">Tentang Kami</span>
                    <h2 class="fw-bold my-3">Profil UMKM Singkong Keripik</h2>
                    <p class="text-muted">Kami adalah UMKM lokal yang bergerak di bidang produksi keripik singkong sejak tahun 2020. Berawal dari usaha rumahan, kami berkomitmen untuk menyajikan keripik singkong berkualitas...</p>
                    
                    <div class="row g-4 mt-3">
                        <div class="col-sm-6">
                            <h6 class="fw-bold text-success"><i class="bi bi-people-fill me-2"></i> Sejak 2020</h6>
                            <p class="small text-muted">Memulai usaha dari skala rumahan.</p>
                        </div>
                        <div class="col-sm-6">
                            <h6 class="fw-bold text-success"><i class="bi bi-target me-2"></i> Misi Kami</h6>
                            <p class="small text-muted">Memberikan camilan sehat, lezat, dan terjangkau.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="features py-5 bg-light">
        </section>
@endsection