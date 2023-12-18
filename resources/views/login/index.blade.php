@extends('layouts.main')

@section('container')
    <title>Login</title>
    <div class="row justify-content-center">
        <div class="col-lg-4 mt-5 p-4">
            @if(session()->has('gagal'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('gagal') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <main class="form-signin">
                <form action="/login" method="post">
                    @csrf
                    <h1 class="h3 mb-3 fw-normal text-center">Silahkan Login</h1>
                    <div class="form-floating">
                        <input type="text" name="nomor_sim" class="form-control @error('nomor_sim') is-invalid @enderror" id="nomor_sim" placeholder="Nomor SIM" value="{{ old('nomor_sim') }}" autofocus required>
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
                    <button class="btn btn-primary w-100 py-2" type="submit">Login</button>
                    @if(session('error'))
                        <div class="alert alert-danger mt-3">
                            {{ session('error') }}
                        </div>
                    @endif
                </form>
                <div class="text-center mt-3">
                    <p>Belum punya akun? <a href="/register">Daftar disini</a></p>
                </div>
            </main>
        </div>
    </div>
@endsection
