@extends('layouts.main')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"></div>
                <div class="card-body">
                    @if (session('error'))
                    <div class="alert alert-danger">
                    {{ session('error') }}
                    </div>
                    @endif
                    @if (session('success'))
                    <div class="alert alert-success">
                    {{ session('success') }}
                    </div>
                    @endif
                    <table class="table table-bordered">
                        <thead>
                            <th>TGL REQUEST</th>
                            <th>ID USER</th>
                            <th>NOMINAL</th>
                            <th>NO REK</th>
                            <th>BANK</th>
                            <th>ATAS NAMA</th>
                            <th>TGL KONFIRMASI</th>
                            <th>STATUS</th>
                        </thead>
                        <tbody>
                            @foreach ($datas as $item)
                                <tr>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->idUser }}</td>
                                    <td>{{ $item->nominal }}</td>
                                    <td>{{ $item->norek }}</td>
                                    <td>{{ $item->bank }}</td>
                                    <td>{{ $item->atas_nama }}</td>
                                    <td>{{ $item->tanggal_konfirmasi }}</td>
                                    <td>{{ $item->status }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="box-footer clearfix" style="padding-top: 20px;">
                        {{ $datas->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection