@extends('adminlte::page')

@section('plugins.Select2', true)

@section('content_header')
    <div class="row d-flex justify-content-between m-1">
        <h1 class="text-bold text-info">Geographic</h1>
        <button class="btn btn-danger btn-sm" id="backto">
            Kembali ke SMAN <i class="fa fas fa-school">
            </i>
        </button>
    </div>
@endsection
@section("content")
    <div class="row-cols-auto">
        <div class="card col-lg-12">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3">
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
                        <h2 class="text-bold text-info">
                            Peta
                        </h2>
                        <div class="map container-fluid" id="map" style="width: 100%; height: 500px">
                        </div>
                    </div>
                </div>
            </div>
            <div class="mouse-position justify-content-end bg-white"></div>
            <div id="popup" class="ol-popup card w-100 invisible">
                <div class="card-body p-2">
                    <h6 class="text-bold text-black">Details: </h6>
                    <div class="popup-content" id="popup-content">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    @vite(["resources/js/gisapp.js","resources/css/style.css"])
@endsection
