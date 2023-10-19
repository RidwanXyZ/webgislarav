@extends('adminlte::page')

@section('plugins.Select2', true)

@section('content_header')
    <h3 class="text-bold text-info">Detail Informasi</h3>
@endsection


@section("content")
    <div class="row-cols-auto">
        <div class="card col-lg-12">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3">
                        <h4 class="text-bold text-info">Peta Persebaran Tempat Tinggal Peserta Didik SMAN 16 Surabaya</h4>
                        <h5 class="text-bold text-teal">Filters:</h5>
                        <p class="text-black">
                            Pilih kelas:
                        </p>
                        <x-adminlte-select2 name="sel2Basic" id="filter-kelas">
                            <option selected value="10">Kelas X</option>
                            <option value="11">Kelas XI</option>
                            <option value="12">Kelas XII</option>
                        </x-adminlte-select2>
                        <button class="btn btn-success" id="filter">
                            <i class="fa fa-search"></i>
                        </button>
                        <h6 class="text-bold text-teal mt-4">
                            Informasi Peserta Didik:
                        </h6>
                        <div class="grid">
                            <div class="row">
                                <div class="col-lg-6 text-info text-bold">
                                    Nama
                                </div>
                                <div class="col-lg-6" id="nama">
                                    Tidak ada
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 text-info text-bold">
                                    NISN
                                </div>
                                <div class="col-lg-6" id="nisn">
                                    Tidak ada
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 text-info text-bold">
                                    Rombel
                                </div>
                                <div class="col-lg-6" id="rombel">
                                    Tidak ada
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 text-info text-bold">
                                    Alamat
                                </div>
                                <div class="col-lg-6" id="alamat">
                                    Tidak ada
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="row d-flex justify-content-between">
                            <h2 class="text-bold text-info">
                                Peta
                            </h2>
                            <button class="btn btn-danger btn-sm m-1" id="backto">
                                Default Coordinate <i class="fa fas fa-school">
                                </i>
                            </button>
                        </div>
                        <div class="map container-fluid border-5" id="map" style="width: 100%; height: 500px">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    @vite(["resources/js/gisapp.js","resources/css/style.css"])
@endsection
