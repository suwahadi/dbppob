@extends('layouts.main')
@section('content')

<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"></div>
                <div class="card-body">

                <form action="{{ route('transaction') }}" method="get">
                    <div class="input-group mb-3 col-md-6 float-right">
                    <input type="text" id="date" name="date" value="" class="form-control">
                        <div class="input-group-append">
                            <button class="btn btn-secondary" type="submit">Filter</button>
                        </div>
                        <a href="{{ route('export-excel') }}" class="btn btn-primary ml-2" id="export">Export Excel</a>
                    </div>
                </form>

                    <table class="table table-bordered">
                        <thead>
                            <th>TANGGAL</th>
                            <th>ID MEMBER</th>
                            <th>PRODUK</th>
                            <th>NO TUJUAN</th>
                            <th>BELI</th>
                            <th>JUAL</th>
                            <th>STATUS</th>
                            <th>RESPONSE</th>
                            <th>VSN</th>
                            <th>SUPPLIER</th>
                            <th>PELANGGAN</th>
                            <th>TAGIHAN</th>
                        </thead>
                        <tbody>
                            @foreach ($datas as $item)
                                <tr>
                                    <td>{{ $item->tanggal }}</td>
                                    <td>{{ $item->idmember }}</td>
                                    <td>{{ $item->kodeproduk }}</td>
                                    <td>{{ $item->notujuan }}</td>
                                    <td>{{ $item->hargabeli }}</td>
                                    <td>{{ $item->hargajual }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>{{ $item->response }}</td>
                                    <td>{{ $item->vsn }}</td>
                                    <td>{{ $item->nama_supplier }}</td>
                                    <td>{{ $item->nama_pelanggan }}</td>
                                    <td>{{ $item->total_tagihan }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<script>
$(function() {
  $('input[name="date"]').daterangepicker({
    opens: 'left'
  }, function(start, end, label) {
    console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
  });
});
</script>

@endsection