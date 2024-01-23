@extends('layouts.home', ['title'=>'Dashboard'])

@section('content')

@section('homeActive')
active
@endsection
 
          
<div class="row">
  <div class="col-12">
    <div class="card">
      
      <div class="card-header">
        <h3 class="card-title">Data Pembayaran</h3>

        <div class="card-tools">
          <div class="input-group input-group-sm" style="width: 150px;">
            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

            <div class="input-group-append">
              <button type="submit" class="btn btn-default">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0">

      

        <table class="table table-hover text-nowrap">
          <thead>
            <tr>
              <th>No</th>
              <th>Bulan</th>
              <th>Tanggal Pembayaran</th>
              <th>File</th>
              <th>Status</th>
              
            </tr>
          </thead>
          <tbody>
            @foreach ($dtLaporan as $i => $item)
            @if ($item->status == 'diterima')
            <tr>
              <th scope="row">{{ $i++  }}</th>
              <td scope="row">{{ $item->bulanbayar }}</td>
              <td>{{ $item->tanggalpembayaran->format('j F Y ') }}</td>
              <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#customModal{{ $item->id }}">
                Open Image
              </button>
              <!-- Modal -->
                <div class="modal fade" id="customModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="customModalLabel" aria-hidden="true">
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
                </div></td>
              <td>{{ $item->status == 'diterima' ? 'Lunas' : ($item->status == 'ditolak' ? 'Ditolak' : 'Sedang Diproses') }}</td>
              
            </tr>

            @endif
            @endforeach
          
          </tbody>
        </table>
        
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  @endsection