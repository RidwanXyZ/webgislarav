<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Exception;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function index()
    {
        return view('upload.upload_json');
    }

    public function store(Request $request)
    {
        // catch exception
        try {
            $validated = $request->validate(["file-json" => "required|file"]);
            if ($validated) {
                $file = $request->file("file-json");
                // read json file
                $json = file_get_contents($file);
                // decode json
                $json_data = json_decode($json, true);
                // insert to database
                for ($i = 0; $i < $json_data['results']; $i++) {
                    $newStudents = new Siswa();
                    $newStudents->nama = $json_data['rows'][$i]['nama'];
                    $newStudents->nisn = $json_data['rows'][$i]['nisn'];
                    $newStudents->kelas = $json_data['rows'][$i]['tingkat_pendidikan_id'];
                    $newStudents->rombel = $json_data['rows'][$i]['rombel'];
                    $newStudents->latitude = $json_data['rows'][$i]['bujur'];
                    $newStudents->longitude = $json_data['rows'][$i]['lintang'];
                    $newStudents->alamat = $json_data['rows'][$i]['alamat_jalan'];
                    $newStudents->save();
                }
                return redirect()->route('upload.json')->with('success', 'Data berhasil diupload');
            }
        } catch (Exception $e) {
            return dd($e->getMessage());
        }
        return redirect()->route('upload.json')->with('error', 'Data gagal diupload');
    }
}
