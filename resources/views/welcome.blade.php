@extends('layouts/main')

@section('container')
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
              <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" value="{{ old('username') }}" autofocus required>
              <label for="email">Email</label>
              @error('email')
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
        </main>
    </div>
</div>


@endsection