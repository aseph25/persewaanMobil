@extends('layouts.main')

@section('container')
<title>Registrasi</title>
<div class="row justify-content-center">
    <div class="col-lg-4 mt-5 p-4">
    @if(session()->has('gagal'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('gagal') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
        <main class="form-register">
          <form action="/register" method="post">
            @csrf
            <h1 class="h3 mb-3 fw-normal text-center">Registrasi</h1>
            <div class="form-floating">
              <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="name@example.com" value="{{ old('nama') }}" autofocus required>
              <label for="nama">Nama</label>
              @error('nama')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-floating">
              <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="name@example.com" value="{{ old('alamat') }}" autofocus required>
              <label for="alamat">Alamat</label>
              @error('alamat')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-floating">
              <input type="text" name="nomor_telepon" class="form-control @error('nomor_telepon') is-invalid @enderror" id="nomor_telepon" placeholder="name@example.com" value="{{ old('nomor_telepon') }}" autofocus required>
              <label for="nomor_telepon">Nomor Telepon</label>
              @error('nomor_telepon')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-floating">
              <input type="text" name="nomor_sim" class="form-control @error('nomor_sim') is-invalid @enderror" id="nomor_sim" placeholder="name@example.com" value="{{ old('nomor_sim') }}" autofocus required>
              <label for="nomor_sim">Nomor SIM</label>
              @error('nomor_sim')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-floating">
              <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Password" required>
              <label for="floatingPassword">Password</label>
              @error('password')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <button class="btn btn-primary w-100 py-2" type="submit">Register</button>
            @if(session('error'))
            <div class="alert alert-danger mt-3">
              {{ session('error') }}
            </div>
            @endif
          </form>
          @if(session('success'))
          <div class="alert alert-success mt-3">
            {{ session('success') }}
          </div>
          <script>
            setTimeout(function() {
              window.location.href = "/login";
            }, 3000); // 3 detik
          </script>
          @endif
        </main>
    </div>
</div>

<div class="row justify-content-center mt-3">
    <div class="col-lg-4">
        <p class="text-center">Sudah punya akun? <a href="/login">Login</a></p>
    </div>
</div>
@endsection
