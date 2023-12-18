@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Data Barang</h1>
</div>
<div class="table-responsive col-lg-12">
  <a href="/tambahbarang" class="btn btn-primary mb-3">Tambah</a>
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
        <th scope="col">Jumlah</th>
        <th scope="col">Harga</th>
        <th scope="col">Tanggal Mulai</th>
        <th scope="col">Tanggal Selesai</th>
        <th scope="col">Opsi</th>
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
        <td>{{ $barang->jumlah }}</td>
        <td>Rp. {{ $barang->harga }}</td>
        <td>{{ $barang->tanggal_mulai }}</td>
        <td>{{ $barang->tanggal_selesai }}</td>

        <td>
                @csrf
                @method('EDIT')
                  <a href="{{ route('barang.edit', $barang->id) }}" class="badge bg-warning"><span data-feather="edit"></span></a>
                <form action=" {{ route('barang.destroy', $barang->id) }} " method="post" class="d-inline" enctype="multipart/form-data">

                <form action=" {{ route('barang.destroy', $barang->id) }} " method="post" class="d-inline" enctype="multipart/form-data">
                @csrf
                @method('DELETE')
                  
                  <button class="badge bg-danger border-0" onclick="return confirm('Apa Anda Yakin?')"><span data-feather="x-circle"></span></button>
                </form>
                
              </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
