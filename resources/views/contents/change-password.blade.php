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
                    <form action="{{ url('/administrator/setting/password') }}" method="POST">
                        @csrf
                        <input type="text" class="form-control" name="username" value="{{ $datas->username }}" readonly style="display: none;">
                        <br>
                        Current Password
                        <input type="password" class="form-control" name="current-password" value="">
                        <br>
                        Retype New Password
                        <input type="password" class="form-control" name="new-password" value="">
                        <br>
                        New Password
                        <input type="password" class="form-control" name="new-password-confirm" value="">
                        <br>
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection