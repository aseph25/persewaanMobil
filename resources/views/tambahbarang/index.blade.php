@extends('dashboard/layouts/main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Tambah Data Barang</h1>
</div>
<div class="col-lg-8">




    @if(session()->has('berhasil'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('berhasil') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
            <form action="/tambahbarang" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
            <label for="merek" class="form-label">Merek</label>
            <input type="text" name="merek" class="form-control rounded-top @error('merek') is-invalid @enderror" id="merek" value="{{ old('merek') }}" required>
            @error('merek')
            <div class="invalid-feedback">
                "Merek" harus diisi
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="model" class="form-label">Model</label>
            <input type="text" name="model" class="form-control @error('model') is-invalid @enderror" id="model" value="{{ old('model') }}" required>
            @error('model')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="nomor_plat" class="form-label">Nomor Plat</label>
            <input type="text" name="nomor_plat" class="form-control @error('nomor_plat') is-invalid @enderror" id="nomor_plat" value="{{ old('nomor_plat') }}" required>
            @error('nomor_plat')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
                <div class="mb-3">
                    <label for="foto" class="form-label">Foto</label>
                    <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" id="foto" required>
                    
                    @error('foto')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                <label for="jumlah" class="form-label">jumlah</label>
                    <input type="number" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" value="{{ old('jumlah') }}" required>
                    
                    @error('jumlah')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                <label for="floatingInput" class="form-label">Harga</label>
                    <input type="text" name="harga" class="form-control @error('harga') is-invalid @enderror" id="harga" value="{{ old('harga') }}" required>
                    
                    @error('harga')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
    <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
    <input type="date" name="tanggal_mulai" class="form-control @error('tanggal_mulai') is-invalid @enderror" id="tanggal_mulai" value="{{ old('tanggal_mulai') }}" required>
    @error('tanggal_mulai')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="mb-3">
    <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
    <input type="date" name="tanggal_selesai" class="form-control @error('tanggal_selesai') is-invalid @enderror" id="tanggal_selesai" value="{{ old('tanggal_selesai') }}" required>
    @error('tanggal_selesai')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
                @if(session('error'))
                <div class="alert alert-danger mt-3">
                    {{ session('error') }}
                </div>
                @endif
                <button class="btn btn-primary mb-5" type="submit">Simpan</button>
            </form>
            </div>

@endsection