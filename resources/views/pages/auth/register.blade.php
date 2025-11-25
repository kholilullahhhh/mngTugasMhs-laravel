@extends('layouts.auth', ['title' => 'Register'])
@section('content')
    @push('styles')
        <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css')}}">
    @endpush

    <div class="card card-primary">
        <div class="card-header">
            <h4>Register</h4>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('regisStore') }}">
                @csrf

                <div class="form-group">
                    <label for="name">Nama Lengkap</label>
                    <input id="name" type="text" class="form-control" name="name" required autofocus>
                </div>

                <div class="form-group">
                    <label for="username">Username</label>
                    <input id="username" type="text" class="form-control" name="username" required>
                </div>

                <div class="form-group">
                    <label for="nip">NIM (Opsional)</label>
                    <input id="nip" type="text" class="form-control" name="nip">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" class="form-control" name="password" required>

                </div>

                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="agree" class="custom-control-input" id="agree" required>
                        <label class="custom-control-label" for="agree">Saya setuju dengan syarat & ketentuan</label>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>

    @push('scripts')
        <script src="{{ asset('library/jquery-pwstrength/pwstrength.js')}}"></script>
        <script src="{{ asset('library/selectric/public/jquery.selectric.min.js')}}"></script>
    @endpush
@endsection