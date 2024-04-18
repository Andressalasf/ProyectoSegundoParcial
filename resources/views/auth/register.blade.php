@extends('layouts.applogin')

@section('content')

<div class="register-box bg-dark.bg-gradient">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="../../index2.html" class="h1"><b>Eco</b>Market</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Registrate para ser poder atenderte</p>

      <form action="{{ route('register') }}" method="post">
      @csrf
        <div class="input-group mb-3">
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nombre">
          <div class="input-group-append">
            <div class="input-group-text bg-blue">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder= "Email">
          <div class="input-group-append">
            <div class="input-group-text bg-blue">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder= "Contraseña">
          <div class="input-group-append">
            <div class="input-group-text bg-blue">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder= "Confirmar">
          <div class="input-group-append">
            <div class="input-group-text bg-blue">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Registrar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center">
       
      </div>

      <a href="login" class="text-center">Ya tengo cuenta</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>




@endsection