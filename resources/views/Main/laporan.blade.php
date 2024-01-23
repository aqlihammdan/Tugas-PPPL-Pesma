@extends('layouts.home', ['title'=>'Laporan'])

@section('laporanActive')
active
@endsection

@section('content')
<div class="content" data-bs-spy="scroll">
  <div class="container-fluid">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Quick Example</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form action="{{ route('simpan-laporan') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="card-body">
          <div class="form-group">
            <label for="exampleInputEmail1">NIS</label>
            <input type="text" class="form-control" id="id" placeholder="1" disabled>
          </div>

            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror"  id="name" name="name" placeholder="Your Name" value="{{ old('name') }}">
            </div>
            
            {{-- validation feedback --}}
            @error('name')
              <p class="text-danger">{{ $message }}</p>
            @enderror

            <div class="form-group">
              <label for="tanggalpembayaran">Tanggal Pembayaran</label>
              <input type="date" class="form-control @error('tanggalpembayaran') is-invalid @enderror"  id="tanggalpembayaran" name="tanggalpembayaran" placeholder="tanggal pembayaran" value="{{ old('tanggalpembayaran') }}">
            </div>

            {{-- validation feedback --}}
            @error('tanggalpembayaran')
              <p class="text-danger">{{ $message }}</p>
            @enderror

            {{-- <div class="form-group">
              <label for="lembaga">File input</label>
              <div class="form-check">
            <input class="form-check-input" type="radio" name="Lembaga" id="Pesma" value="pesma">
            <label class="form-check-label" for="inlineRadio1">Pesma</label>
          </div>
          <div class="form-check ">
            <input class="form-check-input" type="radio" name="Lembaga" id="Pesmi" value="pesmi">
            <label class="form-check-label" for="inlineRadio2">Pesmi</label>
          </div>
            </div> --}}

            {{-- validation feedback --}}
            @error('Lembaga')
              <p class="text-danger">{{ $message }}</p>
            @enderror

          <div class="form-group" >
            <label for="JumlahPembayaran">Jumlah pembayaran</label>
            <select class="form-select row @error('jumlah_pembayaran') is-invalid @enderror" name="jumlah_pembayaran" aria-label="Default select example" value="{{ old('jumlah_pembayaran') }}">
              <option selected>Pilih</option>
              <option value="400">400</option>
              <option value="800">800</option>
              <option value="1200">1.200</option>
            </select>
          </div>

          {{-- validation feedback --}}
          @error('jumlah_pembayaran')
            <p class="text-danger">{{ $message }}</p>
          @enderror
          

          {{-- bulan-pembayaran --}}
          <div class="form-group">
            <label for="bulanbayar">Bulan Pembayaran</label>
            <div class="container">
              <div class="row">
                <div class="col-md-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox"  name="bulanbayar[]" id="Januari" value="Januari">
                    <label class="form-check-label" for="checkbox1">Januari</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="bulanbayar[]" id="Februari" value="Februari">
                    <label class="form-check-label" for="checkbox2">Februari</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox"  name="bulanbayar[]" id="Maret" value="Maret">
                    <label class="form-check-label" for="checkbox3">Maret</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox"  name="bulanbayar[]" id="April" value="April">
                    <label class="form-check-label" for="checkbox4">April</label>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox"  name="bulanbayar[]" id="Mei" value="Mei">
                    <label class="form-check-label" for="checkbox5">Mei</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox"  name="bulanbayar[]" id="Juni" value="Juni">
                    <label class="form-check-label" for="checkbox6">Juni</label> 
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox"  name="bulanbayar[]" id="Juli" value="Juli">
                    <label class="form-check-label" for="checkbox7">Juli</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox"  name="bulanbayar[]" id="Agustus" value="Agustus">
                    <label class="form-check-label" for="checkbox8">Agustus</label>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox"  name="bulanbayar[]" id="September" value="September">
                    <label class="form-check-label" for="checkbox9">September</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox"  name="bulanbayar[]" id="Oktober" value="Oktober">
                    <label class="form-check-label" for="checkbox10">Oktober</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox"  name="bulanbayar[]" id="November" value="November">
                    <label class="form-check-label" for="checkbox11">November</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox"  name="bulanbayar[]" id="Desember" value="Desember"> 
                    <label class="form-check-label" for="checkbox12">Desember</label>
                  </div>
                </div>
              </div>
          </div>
          
          {{-- validation feedback --}}
          @error('bulanbayar[]')
          <p class="text-danger">{{ $message }}</p>
          @enderror

          <div class="form-group">
            <label for="file_bukti">File input</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" class="custom-file-input @error('file_bukti') is-invalid @enderror"  id="file_bukti" name="file_bukti" >
                <label class="custom-file-label" for="file_bukti">Choose file</label>
              </div>
              <div class="input-group-append">
                <span class="input-group-text">Upload</span>
              </div>
            </div>
          </div>
          @error('file_bukti')
            <p class="text-danger">{{ $message }}</p>
          @enderror
            
          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="yakin" name="yakin" required>
            <label class="form-check-label" for="exampleCheck1">Apakah Kamu yakin data kamu sudah benar?</label>
          </div>
        </div>

          @error('yakin')
            <p class="text-danger">{{ $message }}</p>
          @enderror
        <!-- Submit -->
        <div class="card-footer">
          <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">Submit</button>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="myModalLabel">Pesan Sukses</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      Data Anda berhasil dikirim. Silakan tunggu hasilnya.
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                  </div>
              </div>
            </div>
        </div>

      </form>
    </div>
    <!-- /.card -->
  </div><!-- /.container-fluid -->
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
      // Periksa apakah pesan sukses ada dalam sesi
      var successMessage = '{{ session("success") }}';
      if (successMessage) {
          // Tampilkan modal saat halaman dimuat
          var myModal = new bootstrap.Modal(document.getElementById('myModal'));
          myModal.show();
      }
      
  });
</script>

  @endsection