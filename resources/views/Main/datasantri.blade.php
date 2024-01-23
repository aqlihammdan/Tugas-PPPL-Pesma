@extends('layouts.home', ['title'=>'Data Pembayaran Santri'])

@section('pembayaranActive')
active
@endsection

@section('content')
<div class="container-fluid">
{{-- <form>
    <div class="form-group">
        <label for="selectOption">Select Option</label>
        <select class="form-control" id="selectOption" name="selectOption">
            <option value="1">Data Santri Pesma</option>
            <option value="2">Data Santri Pesmi</option>
        </select>
    </div>
</form> --}}

<div id="table1">

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Data Administrasi Santri PESMA</h3>
                  <br>

                  <form class="form-inline mr-auto" action="/datasantri">
                  <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 250px;">
                      <input type="search" name="keyword" class="form-control" placeholder="Search">
          
                      <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                          <i class="fas fa-search"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                </form>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>Nama</th>
                      <th>Bulan </th>
                      <th>Tanggal Pembayaran</th>
                      <th>Jumlah Pembayaran</th>
                      <th>Bukti</th>
                      <th>Status</th>            
                    </tr>
                    </thead>

                    @foreach ($dtLaporanPesma as $i => $item) 
                    @if ($item->status == 'diterima') 
                    <tbody>
                    <tr>
                      <td>{{ $item->name }}</td>
                      <td>{{ $item->bulanbayar }}</td>
                      <td>{{ $item->tanggalpembayaran }}</td>
                      <td>{{ $item->jumlah_pembayaran }}</td>
                      <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#customModal">
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
                      <td>{{ $item->status }}</td>
                      
                    </tr>
                    @endif
                    @endforeach
                    </tbody>
                    
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
  
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      



</div>

{{-- <div id="table2" style="display: none;">
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Data Administrasi Santri PESMI</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                    
                    <thead>
                     
                    <tr>
                      @foreach ($dtLaporanPesmi as $i => $item) 
                    @if ($item->status == 'diterima') 
                      <th>Lembaga</th>
                      <th>Nama</th>
                      <th>Bulan </th>
                      <th>Bukti</th>
                      <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td>{{ $item->Lembaga }}</td>
                      <td>{{ $item->name }}</td>
                      <td>{{ $item->bulanbayar }}</td>
                      <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#customModal{{ $item->id }}">
                        Open Image
                      </button>
                      <!-- Modal -->
                        <div class="modal fade" id="customModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="customModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="customModalLabel">Custom Image Modal</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <img src="{{ url('storage/' .\App\Models\Laporan::select('file_bukti')->where('id', $item->id)->first()->image) }}" alt="Custom Image" class="img-fluid">
                              </div>
                            </div>
                          </div>
                        </div></td>
                      <td>{{ $item->status }}</td>
                    </tr>
                    
                    @endif
                    @endforeach
                    </tbody>
                    
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
  
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
</div> --}}
</div>
<script>
    var selectOption = document.getElementById('selectOption');
    var table1 = document.getElementById('table1');
    var table2 = document.getElementById('table2');

    
    
    selectOption.addEventListener('change', function() {
        if (selectOption.value === '1') {
            table1.style.display = 'block';
            table2.style.display = 'none';
        } else if (selectOption.value === '2') {
            table1.style.display = 'none';
            table2.style.display = 'block';
        } else {
            table1.style.display = 'none';
            table2.style.display = 'none';
        }
    });
    
    
</script>



  
@endsection