@extends('layouts.app')

@section('content')
<div class="container py-4">
    <!-- Header Profil -->
    <div class="text-center mb-5">
        <h2 class="fw-bold">{{ session('user_name') }}</h2>
        <p class="text-muted">{{ session('user_email') }}</p>
    </div>

    <!-- Data Diri -->
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">Tentang Saya</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex">
                            <span class="fw-bold me-3" style="width: 120px;">Alamat</span>
                            <span>{{ $profile['alamat'] }}</span>
                        </li>
                        <li class="list-group-item d-flex">
                            <span class="fw-bold me-3" style="width: 120px;">Tanggal Lahir</span>
                            <span>{{ $profile['tanggal_lahir'] }}</span>
                        </li>
                        <li class="list-group-item d-flex">
                            <span class="fw-bold me-3" style="width: 120px;">Fakultas</span>
                            <span>{{ $profile['Fakultas'] }}</span>
                        </li>
                        <li class="list-group-item d-flex">
                            <span class="fw-bold me-3" style="width: 120px;">Jurusan</span>
                            <span>{{ $profile['Jurusan'] }}</span>
                        </li>
                        <li class="list-group-item d-flex">
                            <span class="fw-bold me-3" style="width: 120px;">Angkatan</span>
                            <span>{{ $profile['Angkatan'] }}</span>
                        </li>
                        <li class="list-group-item d-flex">
                            <span class="fw-bold me-3" style="width: 120px;">Mata Kuliah</span>
                            <span>{{ $profile['Mata Kuliah'] }}</span>
                        </li>
                        <li class="list-group-item d-flex">
                            <span class="fw-bold me-3" style="width: 120px;">Kelas</span>
                            <span>{{ $profile['Kelas'] }}</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Motivasi -->
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h5 class="card-title text-success">Motivasi Saya</h5>
                    <p class="card-text">{{ $profile['motivasi'] }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection