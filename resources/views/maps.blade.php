@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-sm-4 bg-black p-4">
            Testing
        </div>
        <div class="col-sm-8 fill" id="map" style="height:100vh; width: 100%;"></div>
    </div>
    <div id="popup" class="ol-popup card w-100 invisible">
        <div class="card-body p-2">
            <h6 class="text-bold text-black">Details: </h6>
            <div class="popup-content" id="popup-content">
            </div>
        </div>
    </div>
@endsection

@section('js')
    @vite(["resources/js/gisapp.js","resources/css/style.css"])
@endsection
