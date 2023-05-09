@extends('mahasiswas.layout')

@section('content')

<div class="container mt-5">

 <div class="row justify-content-center align-items-center">
 <div class="card" style="width: 24rem;">
 <div class="card-header">
 Tambah Mahasiswa
 </div>
 <div class="card-body">
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
 <form method="post" action="{{ route('mahasiswas.store') }}" id="myForm" enctype="multipart/form-data">
 @csrf
 <div class="form-group">
 <label for="Nim">Nim</label>
 <input type="text" name="Nim" class="form-control" id="Nim" aria-describedby="Nim" >
 </div>
 <div class="form-group">
 <label for="Nama">Nama</label>
 <input type="Nama" name="Nama" class="form-control" id="Nama" aria-describedby="Nama" >
 </div>
 <div class="from-group">
 <label for="image">Feature Image: </label>
 <input type="file" class="form-control" required="required" name="image">
 </div>
 <div class="form-group">
 <label for="TTL">TTL</label>
 <input type="date" name="TTL" class="form-control" id="TTL" aria-describedby="TTL" >
 </div>
 <div class="form-group">
 <label for="kelas">Kelas</label>
 <select name ="kelas" class="form-control">
    @foreach ($kelas as $Kelas)
    <option value="{{$Kelas->id}}">{{$Kelas->nama_kelas}}</option>
    @endforeach
 </select>
 <!-- <input type="Kelas" name="Kelas" class="form-control" id="Kelas" aria-describedby="password" > -->
 </div>
 <div class="form-group">
 <label for="Jurusan">Jurusan</label>
 <input type="Jurusan" name="Jurusan" class="form-control" id="Jurusan" aria-describedby="Jurusan" >
 </div>
 <div class="form-group">
 <label for="No_Handphone">No_Handphone</label>
 <input type="No_Handphone" name="No_Handphone" class="form-control" id="No_Handphone" aria-describedby="No_Handphone" >
 </div>
 <label for="Email">Email</label>
 <input type="E-mail" name="Email" class="form-control" id="Email" aria-describedby="Email" >
 </div>
 <button type="submit" class="btn btn-primary">Submit</button>
 <a class="btn btn-success mt3" href="{{ route('mahasiswas.index') }}">Kembali</a>
 </form>
 </div>
 </div>
 </div>
 </div>
@endsection