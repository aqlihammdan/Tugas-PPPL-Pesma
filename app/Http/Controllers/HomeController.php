<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userName = auth()->user()->name;
        $dtLaporan = Laporan::where('name', $userName)->orderBy('tanggalpembayaran', 'desc')->get();
        //dd($dtLaporan);
        // if (auth()->user()->type == 'admin') {
        //     return redirect()->route('datasantri');
        // }else{
        //     return redirect()->route('laporan')->compact('dtLaporan');
        // }
        return view ('home',compact('dtLaporan'));
    }

    
}
