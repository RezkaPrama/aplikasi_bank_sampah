@extends('layouts.user', ['title' => 'Dashboard'])

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->


    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-md-6">

            <div class="card border-0 shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold">Total Harga</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <h5>{{ moneyFormat($totalHarga) }}</h5>
                </div>
            </div>
        </div>

    </div>

    <div class="row">

        <div class="col-md-6">
            <div class="card border-0 shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold">Harga {{ $jenisSampah }} / Kg</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <h5>{{ moneyFormat($hargaPerKg) }}</h5>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card border-0 shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold">Jumlah Sampah </h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <h5>{{ $jumlahSampah }} Kg</h5>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection