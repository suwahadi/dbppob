@foreach ($data as $data)
    <div class="card">
        <div class="card-header">{{ $data[0]->provider }}</div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <th>Kode Produk</th>
                    <th>Nominal</th>
                    <th>Harga</th>
                    <th>Status</th>
                </thead>
                @foreach ($data as $item)
                <tr>
                    <td>{{ $item->kode }}</td>
                    <td>{{ $item->nominal }}</td>
                    <td>{{ $item->hargajual }}</td>
                    <td>
                        @if ($item->gangguan)
                        <label class="text-danger">Gangguan</label>
                        @else
                        <label class="text-success">Ready</label>
                        @endif
                    </td>
                    <td><a href="#" class="text-warning text-sm" onclick="editHarga('{{ $item->kode }}', '{{ $item->hargajual  }}')" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-edit"></i> Edit Harga</a></td>
                    </tr>
                    @endforeach
            </table>
        </div>
    </div>
@endforeach