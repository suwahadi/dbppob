@extends('layouts.main')
@section('content')

    <div class="row">
        <div class="col-md-12">

        <a href="#" data-toggle="modal" data-target="#ModalTambah"><button class="btn-btn-primary float-left" type="button" >Tambah Produk</button></a>
        <br><br>

            <select name="selectType" id="selectType" class="form-control">
                <option value="">-- Pilih Tipe</option>
                @foreach ($types as $type)
                    <option value="{{ $type[0]->tipe }}">{{ $type[0]->tipe }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <br>
    <br>
    <div class="row">
        <div class="col-md-12" id="card-container">
        </div>
    </div>
  

  <!-- Modal Add -->
  <div class="modal fade" id="ModalTambah" tabindex="-1" role="dialog" aria-labelledby="ModalTambahLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalTambahLabel">Tambah Produk</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ url("/administrator/product/add") }}" method="POST">
                @csrf
                <label>Kode Produk</label>
                <input type="text" id="kode" class="form-control" name="kode" required>
                <label>Provider</label>
                <input type="text" id="provider" class="form-control" name="provider" required>
                <label>Nominal</label>
                <input type="number" id="nominal" class="form-control" name="nominal" required>
                <label>Harga</label>
                <input type="number" id="hargajual" class="form-control" name="hargajual" required>
                <label>Status</label>
                <select name="gangguan" id="gangguan" class="form-control">
                    <option value="0">Ready</option>
                    <option value="1">Gangguan</option>
                </select>
                <br>
                <button class="btn-btn-primary float-right" type="submit" >Simpan</button>
            </form>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>


  <!-- Modal Edit -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Produk</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ url("/administrator/product/edit") }}" method="POST">
                @csrf
                <input type="hidden" name="kodeProduk" id="kodeProduk">
                <label for="kode">Kode Produk</label>
                <input type="text" disabled id="form-kode" class="form-control">
                <label for="harga">Harga</label>
                <input type="number" id="form-harga" class="form-control" name="harga">
                <button class="btn-btn-primary float-right" type="submit" >Simpan</button>
            </form>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>

@endsection

@section('script-js')
    <script>
        $(() => {
            $("#selectType").change((e) => {
                $tipeval = $("#selectType").val();
                $.ajax({
                    type: "GET",
                    url: "{{ url('/getCardProduct') }}?type=" + $tipeval,
                    success: function (response) {
                        $("#card-container").html(response);
                    }
                });
            });
        });

        function editHarga(kode, harga) {
            document.getElementById("kodeProduk").value = kode;
            document.getElementById("form-kode").value = kode;
            document.getElementById("form-harga").value = harga;
        }
    </script>
@endsection