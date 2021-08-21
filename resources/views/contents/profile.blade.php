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
                    <form action="{{ url('/administrator/setting/profile') }}" method="POST">
                        @csrf
                        Username
                        <input type="text" class="form-control" name="username" value="{{ $datas->username }}" readonly>
                        <br>
                        Nama
                        <input type="text" class="form-control" name="nama" value="{{ $datas->nama }}" required>
                        <br>
                        Email
                        <input type="text" class="form-control" name="email" value="{{ $datas->email }}" required>
                        <br>
                        HP
                        <input type="text" class="form-control" name="hp" value="{{ $datas->hp }}" required>
                        <br>
                        Tanggal Lahir
                        <input type="text" class="form-control" name="tanggal_lahir" value="{{ $datas->tanggal_lahir }}" required>
                        <br>
                        API Key
                        <input type="text" class="form-control" name="api_key" value="{{ $datas->api_key }}" disabled>
                        <br>
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection