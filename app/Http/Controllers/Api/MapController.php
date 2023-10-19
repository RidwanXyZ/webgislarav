<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function search(Request $request): \Illuminate\Http\JsonResponse
    {
        $students = Siswa::where("kelas", $request->get('kelas'))->get();

        $geoStudentsData = $students->map(function($student){
            return [
                "name" => $student->nama,
                "nisn" => $student->nisn,
                "kelas" => $student->kelas,
                "alamat" => $student->alamat,
                "rombel" => $student->rombel,
                "geometry" => [
                    "longitude" => $student->longitude,
                    "latitude" => $student->latitude,
                ],
            ];
        });
        return response()->json([
            "meta" => [
                "status" => 200,
                "message" => "Success",
            ],
            "data" => $geoStudentsData
        ]);
    }
}
