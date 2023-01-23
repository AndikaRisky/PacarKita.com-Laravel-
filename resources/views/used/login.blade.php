@extends('master.master')
@section('title','Login')
@section('container')

<div class="row justify-content-center mt-5">
    <div class="row-lg-5 ">
        <main class="form-signin m-auto">
            @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session('success')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @elseif (session()->has('loginError'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{session('loginError')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <form action="/login" method="POST">
                @csrf
              <img class="center-image mb-5 mt-5" src="/storage/store-images/Icon/couple1.Png" alt="" width="150">
              <h1 class="h4 mb-3 fw-normal text-center" > Silahkan Login</h1>

              <div class="form-floating">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email"
                placeholder="name@example.com" required autofocus  value="{{old('email')}}">
                @error('email')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
                <label for="email"><i class="bi bi-envelope-at"></i> Email</label>
              </div>
              <div class="form-floating">
                <input type="password" name="password"class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" required autofocus>
                @error('password')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
                <label for="password"><i class="bi bi-lock"></i> Password</label>
              </div>
              <button id="sign-in-button" class="w-100 btn btn-lg btn-primary" type="submit">LOGIN</button>
            </form>
            <small class="d-block text-center mt-2">
                <i class="bi bi-clipboard-check"></i>Belum Terdaftar?<a href="/register">Daftar Sekarang!</a>
            </small>
        </main>
    </div>
</div>
@endsection
