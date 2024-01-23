<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use App\Models\Laporan;

class AdminController extends Controller
{
    public function approve(Request $request, $id)
    {
        // Temukan data pengguna berdasarkan ID
        // $user = User::findOrFail($id);
        // $id = $user->id;
        $report = Laporan::findOrFail($id);

        // Lakukan validasi input dari admin
        $validatedData = $request->validate([
            'status' => 'required|in:diterima,ditolak',
        ]);
        
        if ($request->input('status') == 'diterima') {
            $report->status = 'diterima';
            $report->save();
            return redirect()->back()->with('success', 'Data Anda telah disetujui');
        } elseif ($request->input('status') == 'ditolak') {
            $report->status = 'ditolak';
            $report->save();
            return redirect()->back()->with('error', 'Data Anda ditolak, silakan kirim ulang');
        }
        
    
        // Update status pengguna berdasarkan input dari admin
        // $user->status = $validatedData['status'];
        // $user->save();
    
        // Redirect atau berikan respons sesuai kebutuhan Anda
        return redirect()->back()->with('error', 'Data tidak valid.');
    }
}
