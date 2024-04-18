@extends('layouts.applogin')

@section('title', 'Login')


@section('content')

    <div class="login-box ">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="../../index2.html" class="h1"><b>Eco</b>Market</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Iniciar Sesion</p>

                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                            id="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email"
                            autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text bg-blue">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3 ">
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            placeholder="Password" name="password" required autocomplete="current-password">
                        <div class="input-group-append">
                            <div class="input-group-text bg-blue">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <!-- /.col -->
                    <div class="row">
                        <div class="col-6 mx-auto">
                            <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
                        </div>
                        <div class="col-6 mx-auto">
                            <a href="{{ route('register') }}" class="btn btn-primary btn-block">Registro</a>
                        </div>

                    </div>

                    <!-- /.col -->
            </div>
            </form>

            <div class="social-auth-links text-center mt-2 mb-3">


            </div>
            <!-- /.social-auth-links -->

            <p class="mb-1 ml-2">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">Olvide mi contraseña</a>
                @endif
            </p>

        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    </div>





@endsection
