<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $table = "laporan";
    protected $primarykey =['id'];
    protected $fillable =['id','name', 'tanggalpembayaran', 'jumlah_pembayaran','bulanbayar','file_bukti'];
    protected $casts = ['tanggalpembayaran'=>'date'];

    public function scopeSearchQuery($query)
    {
        if(request('keyword')) {
            return $query->where('name', 'like', '%' . request('keyword') . '%');
        }
    }
}
