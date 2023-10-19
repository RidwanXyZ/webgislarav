<?php

namespace App\Imports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\ToModel;

class StudentsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Siswa([
            'nama' => $row[0],
            'alamat' => $row[1],
            'kelas' => $row[2],
            'latitude' => $row[3],
            'longitude' => $row[4],
        ]);
    }
}
