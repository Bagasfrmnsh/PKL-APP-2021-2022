@extends('adminlte::page')
@section('title','Dashboard')
@section('content_header')
<div class="content-header">
    <div class="container-fluid">
        <div class="mb-2 row">
            <div class="col-sm-12">
                <h1 class="m-0">Data Barang</h1>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Data Barang
                    <a href="{{route('pengelola.create')}}" class="float-right btn btn-sm btn-outline-primary">Tambah Barang</a>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="table-responsive table-striped">
                        <table class="table">
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Stock</th>
                                <th>Tanggal Masuk</th>
                                <th>Harga</th>
                                <th>Kategori</th>
                                <th>Deskripsi</th>
                                <th>Gambar</th>
                                <th>Aksi</th>

                            </tr>
                            @php $no=1; @endphp
                            @foreach($barang as $data)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$data->nama_barang}}</td>
                                    <td>{{$data->stock}}</td>
                                    <td>{{$data->tanggal_masuk}}</td>
                                    <td>{{$data->harga}}</td>
                                    <td>{{$data->kategori}}</td>
                                    <td>{{$data->deskripsi}}</td>
                                    <td>{{$data->gambar}}</td>

                                    <td>
                                        <a href="{{route('pengelola.edit', $data->id)}}" class="mb-2 btn btn-outline-info">Edit</a>
                                        <form action="{{route('pengelola.destroy', $data->id)}}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Apakah anda yakin menghapus')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            {{ $barang->links() }}
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection