<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function create(){
        return view('Main.laporan');
    }
    
    function index(){
        $laporan = Laporan::get();

        return view('Main.laporan', compact('laporan'));
    }
    
    function store(Request $request){
        // VALIDASI
        // dd($request->all());
        // Laporan::create($request->all());

    }

    // function show(Request $request, $id){
    //     $laporan = Laporan::where('id', $id)->firstOrFail();

    // }
}
