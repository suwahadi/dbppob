@extends('layouts.main')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"></div>
                <div class="card-body">
                    <form action="{{ url('/administrator/topupsaldo/create') }}" method="POST">
                        @csrf
                        ID Pengguna
                        <input type="text" class="form-control" name="iduser" required>
                        <br>
                        Nominal
                        <input type="text" class="form-control" name="nominal" required>
                        <br>
                        Bank
                        <input type="text" class="form-control" name="bank" required>
                        <br>
                        Nomor Rekening
                        <input type="text" class="form-control" name="norek" required>
                        <br>
                        Atas Nama
                        <input type="text" class="form-control" name="an" required>
                        <br>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection