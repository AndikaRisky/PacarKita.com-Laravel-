@extends('master.master')
@section('title','Register')
@section('container')

<div class="row justify-content-center mt-5">
    <div class="row-cols-5">
        <main class="form-signin w-100 m-auto">
            <form action="/register" method="POST">
                @csrf
              <img class="center-image mb-5 mt-4" src ="/storage/store-images/Icon/couple.Png"alt="" width="150">
              <h1 class="h4 mb-3 fw-normal text-center" >Silahkan Isi</h1>

              <div class="form-floating">
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name"
                placeholder="name" required autofocus value="{{old('name')}}">
                @error('name')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
                <label for="name"><i class="bi bi-person-add"></i> Nama</label>
              </div>

              <div class="form-floating">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email"
                placeholder="name@example.com" required autofocus value="{{old('email')}}">
                @error('email')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
                <label for="email"><i class="bi bi-envelope-at"></i> Email</label>
              </div>

              <div class="form-floating">
                <input type="text" name="no" class="form-control @error('no') is-invalid @enderror" id="no"
                placeholder="+62..." required autofocus value="{{old('no')}}">
                @error('no')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
                <label for="no"><i class="bi bi-envelope-at"></i> No</label>
              </div>

              <div class="form-floating">
                <input type="password" name ="password" class="form-control  @error('password') is-invalid @enderror" id="floatingPassword"
                placeholder="Password" required autofocus>
                @error('password')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
                <label for="floatingPassword"><i class="bi bi-lock"></i> Password</label>
              </div>
              <button id="sign-in-button" class="w-100 btn btn-lg btn-primary" type="submit">Daftar</button>
            </form>
            <small class="d-block text-center mt-2">
                <i class="bi bi-box-arrow-in-right"></i> Sudah Punya Akun?<a href="/login">Login Di Sini</a>
            </small>
        </main>
    </div>
</div>
@endsection
