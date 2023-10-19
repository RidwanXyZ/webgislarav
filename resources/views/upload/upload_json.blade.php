@extends('adminlte::page')

@section('plugins.Select2', true)
@section('plugins.BsCustomFileInput', true)

@section('content_header')
    <h1 class="text-bold text-info">Upload JSON</h1>
@endsection
@section('content')
    @if(session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> {{ session()->get('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @elseif(session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> {{ session()->get('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <form action="{{ route('upload.json') }}" enctype="multipart/form-data" method="POST">
        @csrf
        <x-adminlte-input-file name="file-json" igroup-size="sm" id="file-json">
            <x-slot name="prependSlot">
                <div class="input-group-text bg-lightblue">
                    <i class="fas fa-upload"></i>
                </div>
            </x-slot>
        </x-adminlte-input-file>
        <button class="btn btn-primary" type="submit">
            Upload
        </button>
    </form>
@endsection
@section('js')
    <script>
        $('#file-json').text('Upload JSON');
    </script>
@endsection
