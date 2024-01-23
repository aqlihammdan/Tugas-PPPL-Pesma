<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Laporan;
use App\Models\Admin;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class BerandaController extends Controller
{
    //Laporan Pembayaran
    public function laporan(){
        return view ('Main.laporan');
    }
    
    public function verifikasidata(){
        $dtLaporan = Laporan::whereNull('status')->get();
        return view('Main.verifikasidata',compact('dtLaporan'));
    }

    public function simpan(Request $request){
        // dd($request->all());
        // dd($request);
        // return $request->file('file_bukti')->store('Post-images');
        // Validasi
        // $this->validate($request, [
        //     'name'=> ['required','max:255'],
        //     'tanggalpembayaran'=> 'required',
        //     //'Lembaga'=> 'required',
        //     'jumlah_pembayaran'=> 'required',
        //     'bulanbayar'=> 'required',
        //     'file_bukti'=> ['image','max:1024'],
        // ]);

        $id = User::count() + 1;
        $name = $request->post('name');
        $tanggalpembayaran = $request->post('tanggalpembayaran');
        $jumlah_pembayaran = $request->post('jumlah_pembayaran');
        $bulanbayar = $request->post('bulanbayar');
        
        $file_bukti = $request->file('file_bukti');
        $imageExtension = $file_bukti->getClientOriginalExtension();
        $imageName = $id . "_" . $request->post('name') . '.' . $imageExtension;
        Storage::disk('public_images')->put($imageName, File::get($file_bukti));
        

        $laporan = new Laporan;
        $laporan->name = $name;
        $laporan->tanggalpembayaran = $tanggalpembayaran;
        $laporan->jumlah_pembayaran = $jumlah_pembayaran;
        $laporan->bulanbayar = implode($bulanbayar);
        $laporan->file_bukti = $imageName;
        $laporan->save();
        
        

        // create
        // Laporan::create([
        //     'name' => $request->name,
        //     'tanggalpembayaran' => $request->tanggalpembayaran,
        //     //'Lembaga' => $request->Lembaga,
        //     'jumlah_pembayaran' => $request->jumlah_pembayaran,
        //     'bulanbayar' => implode(',', $request->bulanbayar),
        //     'file_bukti' => $request->file('file_bukti')->store('Post-images'),
        // ]);

        //dd($request);

        // untuk image
        
        

        session()->flash('success', 'Data Anda berhasil dikirim. Silakan tunggu hasilnya.');

        return redirect('laporan');
    }

    public function hasil(){
        return view ('Main.verifikasidata');
    }

    public function datasantri(){

        //dd(request('keyword'));
        
        $dtLaporanPesma = Laporan::latest()->searchQuery()->paginate(10);
        //$dtLaporanPesmi = Laporan::where('Lembaga', 'Pesmi')->get();

        return view ('Main.datasantri',compact('dtLaporanPesma'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    //history
    public function History(){
        $userName = auth()->user()->name;
        $dtLaporan = Laporan::where('name', $userName)->orderBy('tanggalpembayaran', 'desc')->get();
        //dd($dtLaporan);
        return view ('Main.History',compact('dtLaporan'));
    }
    
}
