@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-success text-white py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">
                            <i class="fas fa-plus-circle me-2"></i>Edit Data Sampah
                        </h4>
                        <a href="{{ url('/pengelolaan') }}" class="btn btn-outline-light btn-sm">
                            <i class="fas fa-arrow-left me-1"></i> Kembali
                        </a>
                    </div>
                </div>
                
                <div class="card-body p-4">
                    <form action="{{ route('update', $kontribusi->id) }}" method="post" id="editDataForm">
                        @csrf
                        <!-- Kategori -->
                        <div class="mb-4">
                            <label for="kategori" class="form-label fw-bold fs-5">
                                <i class="fas fa-tags me-2 text-success"></i>Kategori
                            </label>
                            <select class="form-select form-select-lg" id="Kategori" name="Kategori" required>
                                <option value="" selected disabled>Pilih Jenis Kategori</option>
                                <option value="Organik">Organik</option>
                                <option value="Anorganik">Anorganik</option>
                                <option value="B3">Bahan Berbahaya (B3)</option>
                            </select>
                        </div>
                        
                        <!-- Contoh Barang -->
                        <div class="mb-4">
                            <label for="contoh" class="form-label fw-bold fs-5">
                                <i class="fas fa-list-ul me-2 text-success"></i>Contoh Barang
                            </label>
                            <input type="text" class="form-control form-control-lg" id="Contoh_Barang" name="Contoh_Barang" value="{{ $kontribusi -> Contoh_Barang}}"
                                   placeholder="Contoh: Botol plastik, daun kering, baterai" required>
                        </div>
                        
                        <!-- Cara Pemilahan -->
                        <div class="mb-4">
                            <label for="pemilahan" class="form-label fw-bold fs-5">
                                <i class="fas fa-sort me-2 text-success"></i>Cara Pemilahan
                            </label>
                            <textarea class="form-control form-control-lg" id="Cara_Pemilahan" name="Cara_Pemilahan" value="{{ $kontribusi -> Cara_Pemilahan}}"
                                      rows="4" placeholder="Masukkan cara pemilahan (pisahkan dengan baris baru untuk poin berbeda)" required></textarea>
                            <div class="form-text">
                                Gunakan baris baru untuk setiap poin penting
                            </div>
                        </div>
                        
                        <!-- Tempat Pembuangan -->
                        <div class="mb-4">
                            <label for="tempat" class="form-label fw-bold fs-5">
                                <i class="fas fa-trash-alt me-2 text-success"></i>Tempat Pembuangan
                            </label>
                            <input type="text" class="form-control form-control-lg" id="Tempat_Pembuangan" name="Tempat_Pembuangan" value="{{ $kontribusi-> Tempat_Pembuangan}}"
                                   placeholder="Contoh: Bank sampah terdekat, komposter rumah, dropbox B3" required>
                        </div>
                        
                        <!-- Action Buttons -->
                        <div class="d-flex justify-content-between mt-4">
                                <button type="edit" class="btn btn-success btn-lg">
                                    <i class="fas fa-save me-2"></i>Simpan Data
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Preview Button Handler
        document.getElementById('previewBtn').addEventListener('click', function() {
            const kategori = document.getElementById('kategori').value;
            const contoh = document.getElementById('contoh').value;
            const pemilahan = document.getElementById('pemilahan').value;
            const tempat = document.getElementById('tempat').value;
            
            if (kategori && contoh && pemilahan && tempat) {
                const previewContent = `
                    <p><strong>Kategori:</strong> <span class="badge bg-${getBadgeColor(kategori)}">${kategori}</span></p>
                    <p><strong>Contoh Barang:</strong> ${contoh}</p>
                    <p><strong>Cara Pemilahan:</strong></p>
                    <ul>${formatPemilahan(pemilahan)}</ul>
                    <p><strong>Tempat Pembuangan:</strong> ${tempat}</p>
                `;
                
                document.getElementById('previewContent').innerHTML = previewContent;
                document.getElementById('dataPreview').classList.remove('d-none');
            } else {
                alert('Harap isi semua field terlebih dahulu!');
            }
        });
        
        // Reset Button Handler
        document.getElementById('resetBtn').addEventListener('click', function() {
            document.getElementById('tambahDataForm').reset();
            document.getElementById('dataPreview').classList.add('d-none');
        });
        
        // Helper Functions
        function getBadgeColor(kategori) {
            switch(kategori) {
                case 'Organik': return 'success';
                case 'Anorganik': return 'primary';
                case 'B3': return 'danger';
                default: return 'secondary';
            }
        }
        
        function formatPemilahan(text) {
            return text.split('\n').filter(item => item.trim() !== '').map(item => `<li>${item}</li>`).join('');
        }
    });
</script>
@endpush

@push('styles')
<style>
    .card {
        border-radius: 10px;
        overflow: hidden;
    }
    .form-control-lg, .form-select-lg {
        padding: 12px 16px;
        font-size: 1.1rem;
    }
    .form-label {
        margin-bottom: 8px;
    }
    #dataPreview {
        transition: all 0.3s ease;
    }
</style>
@endpush
@endsection