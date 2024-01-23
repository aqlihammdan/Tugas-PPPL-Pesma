@extends('layouts.home', ['title'=>'History'])

@section('historyActive')
active
@endsection

@section('content')

<div class="content">
    <div class="container-fluid">
          @if($dtLaporan[0]->status == 'diterima')
          <div class="alert alert-success">
            Pembayaran anda sudah diterima
          </div>
          @elseif($dtLaporan[0]->status == 'ditolak')
          <div class="alert alert-danger">
            Data Anda Ditolak, Silahkan kirim ulang
          </div>
          @endif
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama</th>
        <th scope="col">Bulan</th>
        <th scope="col">Tanggal Pembayaran</th>
        <th scope="col">Keterangan</th>
        <th scope="col">File Bukti</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($dtLaporan as $i => $item)  
      <tr>
        <th scope="row">{{ $i + 1 }}</th>
        <td>{{ $item->name }}</td>
        <td>{{ $item->bulanbayar }}</td>
        <td>{{ $item->tanggalpembayaran->format('j F Y') }}</td>
        <td>{{ $item->status == 'diterima' ? 'Lunas' : ($item->status == 'ditolak' ? 'Ditolak' : 'Sedang Diproses') }}</td>
        <td>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#customModal">
          Open Image
        </button>
        <!-- Modal -->
          <div class="modal fade" id="customModal" tabindex="-1" role="dialog" aria-labelledby="customModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="customModalLabel">Foto Bukti Pembayaran</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <img src="{{url('images/'.\App\Models\Laporan::select('file_bukti')->where('id', $item->id)->first()->file_bukti)}}" alt="Custom Image" class="img-fluid">
                </div>
              </div>
            </div>
          </div>
        </td>
        <td>
        @endforeach
      </tr>
    </tbody>
  </table>
    </div>
    
</div>

      @if(session('success'))
          <div class="alert alert-success">
              {{ session('success') }}
          </div>
      @elseif(session('error'))
          <div class="alert alert-danger">
              {{ session('error') }}
          </div>
      @endif
      
@endsection