@include('partial.navbar')
@extends('master.master')
@section('title','Beranda')
@section('container')
<section style="background-color: #eee;">
    <div class="container py-5">
      <div class="row">
        <div class="col-lg-4">
          <div class="card mb-4">
            <div class="card-body text-center">
                @if ($data->user()->image)
                <img src="{{asset('storage/'.$data->user()->image)}}" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                @else
                <img src="{{asset('storage/store-images/default_profile.png')}}" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                @endif
              <h5 class="my-3">{{auth()->user()->name}}</h5>
              <p class="text-muted mb-1">{{auth()->user()->id}}</p>
            </div>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="card mb-4">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Full Name</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{$data->user()->name}}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Email</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{auth()->user()->email}}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Phone</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{auth()->user()->no}}</p>
                </div>
              </div>
                <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Address</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{auth()->user()->address}}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0"></p>
                </div>
                <div class="col-sm-9">
                    <div class="d-flex flex-row-reverse mb-2 mr-2">
                        <button type="button" class="btn btn-outline-primary ms-1" onclick="location.href='{{ route('edit') }}'">Edit</button>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
