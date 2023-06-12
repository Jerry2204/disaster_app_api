@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    <div class="card" style="min-height: 550px">
        <div class="card-header text-center">
            <h5>Profil Saya</h5>
            <span>{{ auth()->user()->name }}</span>
            <div class="card-header-right">
                <ul class="list-unstyled card-option" style="width: 35px;">
                    <li class=""><i class="icofont icofont-simple-left"></i></li>
                    <li><i class="icofont icofont-maximize full-card"></i></li>
                    <li><i class="icofont icofont-minus minimize-card"></i></li>
                    <li><i class="icofont icofont-refresh reload-card"></i></li>
                    <li><i class="icofont icofont-error close-card"></i></li>
                </ul>
            </div>
        </div>
        <div class="card-block mt-5">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <form action="{{ route('users.profile.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group row {{ $errors->has('name') ? 'has-danger' : '' }}">
                            <label class="col-sm-2 col-form-label" for="name">Name</label>
                            <div class="col-sm-10">
                                <input type="text" id="name" name="name"
                                    class="form-control {{ $errors->has('name') ? 'form-control-danger' : '' }}"
                                    placeholder="Name" value="{{ auth()->user()->name }}">
                                @if ($errors->has('name'))
                                    <div class="col-form-label">
                                        {{ $errors->first('name') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row {{ $errors->has('username') ? 'has-danger' : '' }}">
                            <label class="col-sm-2 col-form-label" for="username">Username</label>
                            <div class="col-sm-10">
                                <input type="text" id="username" name="username"
                                    class="form-control {{ $errors->has('username') ? 'form-control-danger' : '' }}"
                                    placeholder="Username" value="{{ auth()->user()->username }}">
                                @if ($errors->has('username'))
                                    <div class="col-form-label">
                                        {{ $errors->first('username') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row {{ $errors->has('email') ? 'has-danger' : '' }}">
                            <label class="col-sm-2 col-form-label" for="email">Email</label>
                            <div class="col-sm-10">
                                <input type="email" id="email" name="email"
                                    class="form-control {{ $errors->has('email') ? 'form-control-danger' : '' }}"
                                    placeholder="Email" value="{{ auth()->user()->email }}">
                                @if ($errors->has('email'))
                                    <div class="col-form-label">
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div
                            class="form-group row {{ session()->has('old_password') ? 'has-danger' : '' }} {{ $errors->has('old_password') ? 'has-danger' : '' }}">
                            <label class="col-sm-2 col-form-label" for="old_password"> Password Lama</label>
                            <div class="col-sm-10">
                                <input type="password" id="old_password" name="old_password"
                                    class="form-control {{ session()->has('old_password') ? 'form-control-danger' : '' }} {{ $errors->has('old_password') ? 'form-control-danger' : '' }}"
                                    placeholder="Masukkan Password Lama Anda" value="">
                                @if (session()->has('old_password'))
                                    <div class="col-form-label">
                                        {{ session('old_password') }}
                                    </div>
                                @endif
                                @if ($errors->has('old_password'))
                                    <div class="col-form-label">
                                        {{ $errors->first('old_password') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row {{ $errors->has('password') ? 'has-danger' : '' }}">
                            <label class="col-sm-2 col-form-label" for="password">Password</label>
                            <div class="col-sm-10">
                                <input type="password" id="password" name="password"
                                    class="form-control {{ $errors->has('password') ? 'form-control-danger' : '' }}"
                                    placeholder="Password" value="">
                                @if ($errors->has('password'))
                                    <div class="col-form-label">
                                        @foreach ($errors->all() as $error)
                                            {{ $error }} <br>
                                        @endforeach
                                        Format password: Minimal 12 karakter, setidaknya satu huruf kapital, satu huruf
                                        kecil, satu angka, satu karakter spesial.
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row {{ $errors->has('password_confirmation') ? 'has-danger' : '' }}">
                            <label class="col-sm-2 col-form-label" for="password_confirmation">Konfirmasi Password</label>
                            <div class="col-sm-10">
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    class="form-control {{ $errors->has('password_confirmation') ? 'form-control-danger' : '' }}"
                                    placeholder="Confirm Password" value="">
                                @if ($errors->has('password_confirmation'))
                                    <div class="col-form-label">
                                        {{ $errors->first('password_confirmation') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
