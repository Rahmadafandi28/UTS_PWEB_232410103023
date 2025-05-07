@extends('layouts.app')

@section('content')
<div class="container py-5">
    {{-- Header --}}
    <div class="text-center mb-5">
        <h1 class="fw-bold display-4 text-success">Pengelolaan Sampah</h1>
        <p class="lead text-muted">Klasifikasi lengkap cara memilah sampah dengan benar</p>
    </div>

    {{-- Tabel --}}
    <div class="table-responsive">
        <table class="table table-hover align-middle" id="wasteTable">
            <thead class="table-success">
                <tr>
                    <th width="15%">Kategori</th>
                    <th width="25%">Contoh Barang</th>
                    <th width="30%">Cara Pemilahan</th>
                    <th width="30%">Tempat Pembuangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dataSampah as $data)
                <tr data-category="{{ $data['kategori'] }}">
                    <td>
                        <span class="badge bg-{{ $data['color'] }} py-2 px-3 fs-6">
                            {{ $data['kategori'] }}
                        </span>
                    </td>
                    <td>
                        <div class="d-flex align-items-center">
                            <span>{{ $data['contoh'] }}</span>
                        </div>
                    </td>
                    <td>
                        <ul class="mb-0">
                            @foreach($data['pemilahan'] as $item)
                            <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        {{ $data['tempat'] }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Info --}}
    <div class="alert alert-success mt-4">
        <h5 class="alert-heading"><i class="fas fa-lightbulb me-2"></i>Tips!</h5>
        <p class="mb-0">Gunakan kantong berbeda untuk setiap kategori dan beri label yang jelas.</p>
    </div>
</div>
@endsection