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
            <form action="{{ route('edituser', ['id' => auth()->user()->id]) }}" method="POST"  enctype="multipart/form-data">
                @method("PUT")
                @csrf
                <input type="hidden" name="oldimage" value="{{$data->user()->image}}">
                <div class="card mb-4">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-3">
                        <p class="mb-0">Full Name</p>
                      </div>
                      <div class="col-sm-9">
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="name" autofocus value="{{auth()->user()->name}}">
                        @error('name')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                        @enderror
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
                        <div class="col-sm-9 mb-3">
                            <input type="textbox" name="address" class="form-control @error('address') is-invalid @enderror" id="address" placeholder="address" autofocus value="{{ old('address', auth()->user()->address) }}">
                            @error('address')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                          <p class="mb-0">Photo Profile</p>
                        </div>
                        <div class="col-sm-9">
                            <div class="mb-3">
                                <img class="img-preview img-fluid" src="">
                                <input name="image" class="form-control @error('image') is-invalid @enderror" type="file" id="image" onchange="previewImage()">
                                @error('image')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                              </div>
                        </div>
                      </div>
                      <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0"></p>
                        </div>
                    <div class="col-sm-9">
                        <div class="row">
                            <div class="col">
                                <div class="d-flex mb-2">
                                    <button type="button" class="btn btn-danger ms-1" onclick="location.href='{{ route('Profile') }}'">Cancel</button>
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-flex flex-row-reverse mb-2">
                                    <button type="submit" class="btn btn-success ms-1">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
  </section>
@endsection
