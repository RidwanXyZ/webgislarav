@extends('adminlte::page')
@section('plugins.Datatables', true)
@section('content_header')
    <h1 class="text-bold">Daftar Siswa</h1>
@endsection
@php
    $heads = [
        'No',
        'Nama',
        ['label' => 'Kelas', 'width' => 40],
        ['label' => 'Actions', 'no-export' => true, 'width' => 5],
    ];
    $config = [

    'columns' => [null, null, null, ['orderable' => false]],
    ];
@endphp
@section('content')
    <x-adminlte-datatable id="table1" :heads="$heads" :config="$config" theme="light" striped hoverable>
        @php $i = 1; @endphp
        @foreach($students as $student)
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $student->nama }}</td>
                <td>{{ $student->kelas }}</td>
                <td>
                    <nobr>
                        <a href="#" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                            <i class="fa fa-lg fa-fw fa-pen"></i>
                        </a>
                        <a href="#" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                            <i class="fa fa-lg fa-fw fa-trash"></i>
                        </a>
                    </nobr>
                </td>
            </tr>
            @php $i++; @endphp
        @endforeach
    </x-adminlte-datatable>
@endsection
