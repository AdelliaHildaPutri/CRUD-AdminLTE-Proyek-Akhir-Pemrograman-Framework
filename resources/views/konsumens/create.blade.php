<html>

<head>
    <title>Tambah Data Konsumen</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

@extends('layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb text-center mb-4">       
            <h2>Tambah Konsumen Baru</h2>        
    </div>
</div>
     
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
     
<form action="{{ route('konsumens.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

<div class="container" style="margin-top: 50px; max-width: 400px;">  

<div class="col-sm-12 text-center">
    <h1 class="m-3">Tambah Data Konsumen</h1>
</div>

<div class="row mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Tanggal </label>
    <div class="col-sm-9">
    <input type="text" name="tanggal" class="form-control" placeholder="Tanggal">
    </div>
  </div>

  <div class="row mb-3">
    <label for="inputPassword3" class="col-sm-2 col-form-label text-right">Nama </label>
    <div class="col-sm-9">
    <input class="form-control" type="text" name="nama"  placeholder="Nama"></input>
    </div>
  </div>

  <div class="row mb-3">
    <label for="inputPassword3" class="col-sm-2 col-form-label text-right">Alamat </label>
    <div class="col-sm-9">
    <input class="form-control" type="text" name="alamat" placeholder="Alamat"></input>
    </div>
  </div>

  <div class="row mb-3">
    <label for="inputPassword3" class="col-sm-2 col-form-label text-right">Telp </label>
    <div class="col-sm-9">
    <input class="form-control" type="text" name="telp" placeholder="Telp"></input>
    </div>
  </div>

  <div class="row mb-3">
    <label for="inputPassword3" class="col-sm-2 col-form-label text-right">Kendaraan  </label>
    <div class="col-sm-9">
    <input class="form-control" type="text" name="kendaraan" placeholder="Kendaraan"></input>
    </div>
  </div>

  <div class="row mb-3">
    <label for="inputPassword3" class="col-sm-2 col-form-label text-right">Harga </label>
    <div class="col-sm-9">
    <input class="form-control" type="text" name="harga" placeholder="Harga"></input>
    </div>
  </div>

  <div class="row mb-3">
    <label for="inputPassword3" class="col-sm-2 col-form-label text-right">Metode Pembayaran </label>
    <div class="col-sm-9">
    <input class="form-control" type="text" name="metode_pembayaran" placeholder="Metode Pembayaran"></input>
    </div>
  </div>

  <div class="form-group row text-center">
        <div class="col-sm-12">
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
            <a class="btn btn-primary" href="{{ route('konsumens.index') }}">Back</a>
        </div>
    </div>
</div>
</div> 
</form>
@endsection 
 