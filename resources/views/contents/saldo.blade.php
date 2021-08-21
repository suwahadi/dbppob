@extends('layouts.main')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"></div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <th>TANGGAL</th>
                            <th>KODE</th>
                            <th>ID_TRANS</th>
                            <th>ID USER</th>
                            <th>NOMINAL</th>
                            <th>BALANCE</th>
                            <th>KETERANGAN</th>
                        </thead>
                        <tbody>
                            @foreach ($datas as $item)
                                @if ($item->in < 1 && $item->out < 1)
                                @else
                                <tr>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->kode }}</td>
                                    <td>{{ $item->idTransaksi }}</td>
                                    <td>{{ $item->idUser }}</td>
                                    <td class="text-{{ ($item->in < 1) ? 'danger' : 'success' }}">{{ ($item->in < 1) ? $item->out : $item->in }}</td>
                                    <td>{{ $item->bal }}</td>
                                    <td>{{ $item->keterangan }}</td>
                                </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection