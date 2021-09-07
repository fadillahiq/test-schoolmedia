<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class KelasController extends Controller
{
    public function index()
    {
        Paginator::useBootstrap();
        $data = Kelas::latest()->paginate(10);

        return view('siswa.kelas.index', compact('data'))->with('i');
    }
}
