<html>

<head>
    <title>Create Data Produk</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</head>

@extends('layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb text-center mb-4">       
            <h2>Tambah Unit Motor</h2>        
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
     
<form action="{{ route('units.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

<div class="container" style="margin-top: 10px; max-width: 400px;">  

<div class="col-sm-15 text-center">
    <h1 class="m-3">Tambah Data Motor</h1>
</div>

<div class="row row-cols-2 mb-3">
    <label for="inputEmail3" class="col-form-label text-start">Merek Motor :</label>
    <div class="col-sm-9">
        <input class="form-control" type="text" name="merek_motor" placeholder="Merek Motor" required>
    </div>
</div>


  <div class="row row-cols-2 mb-3">
    <label for="inputPassword3" class="col-form-label text-start">Tahun Pembuatan :</label>
    <div class="col-sm-9">
    <input class="form-control" type="text" name="tahun_pembuatan" placeholder="Tahun Pembuatan" required>
    </div>
  </div>

  <div class="row row-cols-2 mb-3">
    <label for="inputEmail3" class="col-form-label text-start">Warna Motor :</label>
    <div class="col-sm-9">
    <input type="text" name="warna_motor" class="form-control" placeholder="Warna Motor" required>
    </div>
  </div>

  <div class="row row-cols-2 mb-3">
    <label for="inputPassword3" class="col-form-label text-start">Harga :</label>
    <div class="col-sm-9">
    <input class="form-control" type="text" name="harga" placeholder="Harga"></input>
    </div>
  </div>

  <div class="row row-cols-2 mb-3">
    <label for="inputPassword3" class="col-form-label text-start">Image :</label>
    <div class="col-sm-9">
    <input class="form-control" type="file" name="image" placeholder="Image"></input>
    </div>
  </div>

  <div class="form-group row text-center">
        <div class="col-sm-12">
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
            <a class="btn btn-primary" href="{{ route('units.index') }}">Back</a>
        </div>
    </div>
</div>
</div> 
</form>
@endsection 
 