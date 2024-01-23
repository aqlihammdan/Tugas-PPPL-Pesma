@extends('layouts.home', ['title'=>'Verify'])

@section('verifyActive')
active
@endsection

@section('content')

<h2>Pesma</h2>
<table class="table">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">NIS</th>
        <th scope="col">Name</th>
        <th scope="col">Tanggal</th>
        {{-- <th scope="col">Lembaga</th> --}}
        <th scope="col">Jumlah Pembayaran</th>
        <th scope="col">File Bukti</th>
        <th scope="col">Verifikasi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($dtLaporan as $i => $item)
          
      
      <tr>
        <th scope="row">{{ $i + 1 }}</th>
        <td>12345</td>
        <td>{{ $item->name }}</td>
        <td>{{ $item->tanggalpembayaran }}</td>
        {{-- <td>{{ $item->Lembaga }}</td> --}}
        <td>{{ $item->jumlah_pembayaran }}</td>
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
          <form action="{{ route('admin_approval', $item->id) }}" method="POST">
            @method('PUT')
            @csrf
            <button type="submit" name="status" value="diterima" name="status" class="btn btn-success" >Diterima</button>
            <button type="submit" name="status" value="ditolak" name="status" class="btn btn-outline-danger">Ditolak</button>
          </form>  
        </td>
      </tr>
      @endforeach
      
      @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
      @elseif(session('error'))
          <div class="alert alert-danger">
              {{ session('error') }}
          </div>
      @endif

      

    </tbody>
  </table>
@endsection