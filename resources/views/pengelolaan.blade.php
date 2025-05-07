@extends('layouts.app')

@section('content')
<div class="container py-5">
    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-5">
        <div class="text-center text-md-start">
            <h1 class="fw-bold display-4 text-success">Pengelolaan Sampah</h1>
            <p class="lead text-muted">Klasifikasi lengkap cara memilah sampah dengan benar</p>
        </div>
        <a href="{{ route('tambah') }}" class="btn btn-success btn-lg">
            <i class="fas fa-plus me-2"></i>Tambah Data
        </a>
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
                    <th width="15%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($kontribusi as $data)
                <tr>
                    <td>
                        <span class="badge 
                            @if($data->Kategori == 'Organik') bg-success
                            @elseif($data->Kategori == 'Anorganik') bg-primary
                            @else bg-danger
                            @endif py-2 px-3 fs-6">
                            {{ $data->Kategori }}
                        </span>
                    </td>
                    <td>{{ $data->Contoh_Barang }}</td>
                    <td>
                        @if(is_array($data->Cara_Pemilahan))
                            <ul class="mb-0">
                                @foreach($data->Cara_Pemilahan as $item)
                                <li>{{ $item }}</li>
                                @endforeach
                            </ul>
                        @else
                            {!! nl2br(e($data->Cara_Pemilahan)) !!}
                        @endif
                    </td>
                    <td>{{ $data->Tempat_Pembuangan }}</td>
                    <!-- Tombol edit di sini (dalam loop) -->
                    <td>
                        <div class="btn-group btn-group-sm">
                            <a href="{{ route('edit', $data->id) }}" class="btn btn-outline-warning">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('delete', $data->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Yakin ingin menghapus?')">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">Belum ada data</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection