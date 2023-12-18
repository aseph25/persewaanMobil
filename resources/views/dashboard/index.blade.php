@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Peminjaman Mobil</h1>
</div>
<div class="table-responsive col-lg-8">

  @if(session()->has('berhasil'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('berhasil') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Merek</th>
        <th scope="col">Model</th>
        <th scope="col">Nomor Plat</th>
        <th scope="col">Foto</th>
        <th scope="col">Harga</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      @foreach($barangs as $barang)
      <tr>
        <th scope="row">{{ $loop->iteration }}</th>
        <td>{{ $barang->merek }}</td>
        <td>{{ $barang->model }}</td>
        <td>{{ $barang->nomor_plat }}</td>
        <td><img src="{{ asset('storage/foto/' . $barang->foto) }}" alt="Foto Barang" width="100"></td>
        <td>Rp. {{ $barang->harga }}</td>
        <td>
        @csrf
                @method('EDIT')
                  <a href="{{ route('dashboard.edit', $barang->id) }}" class="badge bg-warning"><span>Pesan!</span></a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
