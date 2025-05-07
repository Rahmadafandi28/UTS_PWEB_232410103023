@extends('layouts.app')

@section('content')
<div class="container py-5">
    {{-- Header dengan spacing lebih besar --}}
    <div class="text-center mb-5">
        <h1 class="fw-bold display-4 text-success mb-3">Mengenal Jenis Sampah</h1>
        <p class="lead text-muted">Pilah sampah dengan memahami kategorinya untuk masa depan bumi yang lebih baik</p>
    </div>

    {{-- Container utama dengan background subtle --}}
    <div class="bg-light rounded-4 p-4 p-lg-5 mb-5">
        {{-- Card 1: Organik --}}
        <div class="row g-4 align-items-center mb-5">
            <div class="col-lg-5">
                <div class="card border-0 shadow-lg overflow-hidden" style="border-radius: 20px;">
                    <img 
                        src="{{ asset('img/1.jpeg') }}" 
                        class="img-fluid w-100" 
                        alt="Sampah Organik"
                        style="height: 300px; object-fit: cover;"
                    >
                </div>
            </div>
            <div class="col-lg-7">
                <div class="ps-lg-4">
                    <h2 class="fw-bold display-5 text-success mb-3">Sampah Organik</h2>
                    <p class="fs-5 mb-4">Sampah yang berasal dari makhluk hidup, <span class="text-success fw-semibold">mudah terurai</span> secara alami dan ramah lingkungan.</p>
                    <div class="bg-success bg-opacity-10 p-4 rounded-4">
                        <ul class="fs-5 mb-0">
                            <li class="mb-2"><strong>Contoh:</strong> Sisa makanan, daun kering, buah busuk, sayuran</li>
                            <li class="mb-2"><strong>Manfaat:</strong> Bisa diolah menjadi kompos atau pupuk alami</li>
                            <li><strong>Fakta:</strong> 60% sampah rumah tangga adalah organik</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        {{-- Divider --}}
        <hr class="my-5 opacity-10">

        {{-- Card 2: Anorganik --}}
        <div class="row g-4 align-items-center mb-5">
            <div class="col-lg-5 order-lg-2">
                <div class="card border-0 shadow-lg overflow-hidden" style="border-radius: 20px;">
                    <img 
                        src="{{ asset('img/2.jpeg') }}" 
                        class="img-fluid w-100" 
                        alt="Sampah Anorganik"
                        style="height: 300px; object-fit: cover;"
                    >
                </div>
            </div>
            <div class="col-lg-7 order-lg-1">
                <div class="pe-lg-4">
                    <h2 class="fw-bold display-5 text-primary mb-3">Sampah Anorganik</h2>
                    <p class="fs-5 mb-4">Sampah yang <span class="text-primary fw-semibold">tidak mudah terurai</span> tetapi memiliki nilai daur ulang tinggi.</p>
                    <div class="bg-primary bg-opacity-10 p-4 rounded-4">
                        <ul class="fs-5 mb-0">
                            <li class="mb-2"><strong>Contoh:</strong> Botol plastik, kardus, kaleng, kaca, kemasan makanan</li>
                            <li class="mb-2"><strong>Tips:</strong> Cuci dan keringkan sebelum dibuang ke tempat daur ulang</li>
                            <li><strong>Fakta:</strong> Plastik butuh 400 tahun untuk terurai alami</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        {{-- Divider --}}
        <hr class="my-5 opacity-10">

        {{-- Card 3: B3 --}}
        <div class="row g-4 align-items-center">
            <div class="col-lg-5">
                <div class="card border-0 shadow-lg overflow-hidden" style="border-radius: 20px;">
                    <img 
                        src="{{ asset('img/3.jpeg') }}" 
                        class="img-fluid w-100" 
                        alt="Sampah B3"
                        style="height: 300px; object-fit: cover;"
                    >
                </div>
            </div>
            <div class="col-lg-7">
                <div class="ps-lg-4">
                    <h2 class="fw-bold display-5 text-danger mb-3">Sampah B3</h2>
                    <p class="fs-5 mb-4">Sampah <span class="text-danger fw-semibold">berbahaya dan beracun</span> yang memerlukan penanganan khusus.</p>
                    <div class="bg-danger bg-opacity-10 p-4 rounded-4">
                        <ul class="fs-5 mb-0">
                            <li class="mb-2"><strong>Contoh:</strong> Baterai, obat kadaluarsa, elektronik rusak, lampu neon</li>
                            <li class="mb-2"><strong>Bahaya:</strong> Dapat mencemari tanah dan air selama puluhan tahun</li>
                            <li><strong>Penanganan:</strong> Serahkan ke dropbox B3 terdekat</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Quote section lebih besar --}}
    <div class="text-center py-4 mt-3">
        <blockquote class="blockquote">
            <p class="display-6 fst-italic text-muted">"Dengan memilah sampah, kamu menjadi pahlawan bagi bumi"</p>
        </blockquote>
    </div>
</div>
@endsection