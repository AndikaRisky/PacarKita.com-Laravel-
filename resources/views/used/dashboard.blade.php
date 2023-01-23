@include('partial.navbar')
@extends('master.master')
@section('container')
<div class="row">
    @forelse ($data['talent'] as $dataTalent)
        <div class="col col-xl-4">
            <div class="mt-1"style="border-radius: 15px; background-color: #abe8eb; height:250px">
              <div class="card-body p-4">
                <div class="d-flex text-black">
                  <div class="flex-shrink-0">
                    <img src="{{asset('/Storage/'.$dataTalent->Image)}}"
                      alt="Generic placeholder image" class="img"
                      style="width: 150px; font-family: serif; border-radius: 10px;">
                  </div>
                  <div class="flex-grow-1 ms-3">
                    <h5 class="mb-1">{{$dataTalent->Nama.' ('.$dataTalent->Umur.')'}}</h5>
                    <p class="mb-2 pb-1" style="color: #2b2a2a; font-family:serif ;">{{$dataTalent->Deskripsi}}</p>
                    <div class="d-flex justify-content-start rounded-3 p-2 mb-2"
                      style="background-color: #efefef;">
                      <div>
                        <p class="small text-muted mb-1">Success</p>
                        <p class="mb-0">{{$dataTalent->Berhasil}}</p>
                      </div>
                      <div class="px-3">
                        <p class="small text-muted mb-1">Followers</p>
                        <p class="mb-0">{{$dataTalent->Followers}}</p>
                      </div>
                      <div>
                        <p class="small text-muted mb-1">Rating</p>
                        <p class="mb-0">{{$dataTalent->Rating}}</p>
                      </div>
                    </div>
                    <div class="d-flex pt-1">
                            @if (in_array($dataTalent->id,$data['wishlist']))
                                <button onclick="location.href='{{ route('deletelist',['Talent'=> $dataTalent])}}'" type="button" class="btn btn-danger me-1 flex-grow-1">Remove</button>
                            @else
                                <button onclick="location.href='{{ route('addlist',['Talent'=> $dataTalent])}}'" type="button" class="btn btn-secondary me-1 flex-grow-1">Add Whislist</button>
                            @endif
                        <button type="button" class="btn btn-outline-primary flex-grow-1">Follow</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>

        @empty
        {{'Data Kosong'}}
        @endforelse
    </div>
    @endsection

