@extends('layouts.app', ['title' => 'Tambah Jenis Sampah'])

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold"><i class="fas fa-folder"></i> Tambah Jenis Sampah</h6>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.jenis-sampah.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label>Nama Jenis Sampah</label>
                            <input type="text" name="nama" value="{{ old('nama') }}" placeholder="Masukkan Nama Jenis Sampah" class="form-control @error('nama') is-invalid @enderror">

                            @error('nama')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Deskripsi</label>
                            <input type="text" name="deskripsi" value="{{ old('deskripsi') }}" placeholder="Masukkan Deskripsi" class="form-control @error('deskripsi') is-invalid @enderror">

                            @error('deskripsi')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label>Harga</label>
                            <input type="text" name="harga_per_kg" value="{{ old('harga_per_kg') }}" placeholder="Masukkan Harga" class="form-control @error('harga_per_kg') is-invalid @enderror">

                            @error('harga_per_kg')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Foto</label>
                            <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror">

                            @error('foto')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i> Simpan</button>
                        <a href="{{route('admin.jenis-sampah.index')}}" class="btn btn-warning btn-reset" ><i class="fa fa-redo"></i> Kembali</a>

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection