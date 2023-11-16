@extends('layouts.auth', ['title' => 'Login'])

@section('content')

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-md-4">
            <div class="img-logo text-center mt-5">
                <img src="{{ asset('assets/img/company.png') }}" style="width: 180px;">
            </div>
            <div class="card o-hidden border-0 shadow-lg mb-3 mt-5">
                <div class="card-body p-4">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="text-center mb-5">
                        <h1 class="h5 text-gray-900 mb-3">Hitung jumlah sampah Anda</h1>
                    </div>

                    <form action="{{ route('hitung.calculate') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label class="font-weight-bold text-uppercase">Jenis Sampah</label>
                            <select name="jenis_sampah" class="form-control">
                                <option value="">-- Pilih Jenis Sampah--</option>
                                @foreach ($jenisSampah as $sampah)
                                <option value="{{ $sampah->id }}">{{ $sampah->nama }} - {{
                                    moneyFormat($sampah->harga_per_kg) }}/kg</option>
                                @endforeach
                            </select>

                            @error('category_id')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold text-uppercase">Jumlah Sampah (Kg)</label>
                            <input type="number" id="jumlah_sampah" name="jumlah_sampah" min="0"
                                class="form-control @error('jumlah_sampah') is-invalid @enderror"
                                placeholder="Masukkan jumlah_sampah">
                            @error('jumlah_sampah')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Hitung</button>
                        <hr>

                        <a href="{{route('login')}}" class="btn btn-primary btn-block">Login Sebagai Admin</a>

                    </form>

                    @if(isset($totalHarga))
                    <p>Total Harga: {{ $totalHarga }}</p>
                    @endif

                </div>
            </div>
        </div>

    </div>

</div>

@endsection