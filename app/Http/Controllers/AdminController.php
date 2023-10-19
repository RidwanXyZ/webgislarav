<?php

namespace App\Http\Controllers;

use App\Models\Siswa;

class AdminController extends Controller
{
    public function index()
    {
        $students = Siswa::orderBy("nama","asc")->get();
        return view("admin.users",[
            "students" => $students
        ]);
    }
}
