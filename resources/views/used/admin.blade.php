@extends('master.master')
@include('partial.navbar');
@section('title','Daftar Talent')
@section('style')
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
    .table-responsive {
        margin: 30px 0;
    }
    .table-wrapper {
        min-width: 1000px;
        background: #fff;
        padding: 20px;
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
    }
    .table-title {
        padding-bottom: 10px;
        margin: 0 0 10px;
        min-width: 100%;
    }
    .table-title h2 {
        margin: 8px 0 0;
        font-size: 22px;
    }
    .search-box {
        position: relative;
        float: right;
    }
    .search-box input {
        height: 34px;
        border-radius: 20px;
        padding-left: 35px;
        border-color: #ddd;
        box-shadow: none;
    }
    .search-box input:focus {
        border-color: #3FBAE4;
    }
    .search-box i {
        color: #a0a5b1;
        position: absolute;
        font-size: 19px;
        top: 8px;
        left: 10px;
    }
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
    }
    table.table-striped tbody tr:nth-of-type(odd) {
        background-color: #fcfcfc;
    }
    table.table-striped.table-hover tbody tr:hover {
        background: #f5f5f5;
    }
    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }
    table.table td:last-child {
        width: 130px;
    }
    table.table td a {
        color: #a0a5b1;
        display: inline-block;
        margin: 0 5px;
    }
    table.table td a.view {
        color: #03A9F4;
    }
    table.table td a.edit {
        color: #FFC107;
    }
    table.table td a.delete {
        color: #E34724;
    }
    table.table td i {
        font-size: 19px;
    }
    .pagination {
        float: right;
        margin: 0 0 5px;
    }
    .pagination li a {
        border: none;
        font-size: 95%;
        width: 30px;
        height: 30px;
        color: #999;
        margin: 0 2px;
        line-height: 30px;
        border-radius: 30px !important;
        text-align: center;
        padding: 0;
    }
    .pagination li a:hover {
        color: #666;
    }
    .pagination li.active a {
        background: #03A9F4;
    }
    .pagination li.active a:hover {
        background: #0397d6;
    }
    .pagination li.disabled i {
        color: #ccc;
    }
    .pagination li i {
        font-size: 16px;
        padding-top: 6px
    }
    .hint-text {
        float: left;
        margin-top: 6px;
        font-size: 95%;
    }
</style>
<script>
$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
});
</script>
@endsection
@section('container')
<form action="/addOrupdateTalent" method="POST" enctype="multipart/form-data">
    @method("PUT")
    @csrf
    <input type="hidden" name="oldimage" value="{{(array_key_exists('Talent',$data)) ? ($data['Talent']->Image) : old('oldimage')}}">
    <input type="hidden" name="id" value="{{(array_key_exists('Talent',$data)) ? ($data['Talent']->id) : old('id')}}">
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
                <div class="card" style="border-radius: 15px; background-color: #abe8eb">
                    <div class="card-body p-4">
                        <div class="row">
                              <div class="col">
                                <div class="form-floating">
                                    <input type="text" name="Nama" class="form-control @error('Nama') is-invalid @enderror" id="Nama"
                                    placeholder="Nama" required autofocus value="{{(array_key_exists('Talent',$data)) ? ($data['Talent']->Nama) : old('Nama')}}">
                                    @error('Nama')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                    <label for="Nama"><i class="bi bi-person-add"></i> Nama</label>
                                </div>

                                <div class="form-floating">
                                    <input type="text" name="Umur" class="form-control @error('Umur') is-invalid @enderror" id="Umur"
                                    placeholder="name@example.com" required autofocus value="{{(array_key_exists('Talent',$data)) ? ($data['Talent']->Umur) : old('Umur')}}">
                                    @error('Umur')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                    <label for="Umur"><i class="bi bi-universal-access-circle"></i></i></i> Umur</label>
                                </div>

                                <div class="form-floating">
                                    <input type="text" name="Alamat" class="form-control @error('Alamat') is-invalid @enderror" id="Alamat"
                                    placeholder="name@example.com" required autofocus value="{{(array_key_exists('Talent',$data)) ? ($data['Talent']->Alamat) : old('Alamat')}}">
                                    @error('Alamat')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                    <label for="Alamat"><i class="bi bi-geo-alt-fill"></i></i> Alamat</label>
                                </div>
                              </div>
                              <div class="col">

                                <div class="form-floating">
                                    <input type="text" name="No" class="form-control @error('No') is-invalid @enderror" id="No"
                                    placeholder="+62..." required autofocus value="{{(array_key_exists('Talent',$data)) ? ($data['Talent']->No) : old('No')}}">
                                    @error('No')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                    <label for="No"><i class="bi bi-telephone-plus"></i> No</label>
                                </div>

                                <div class="form-floating">
                                    <input type="textarea" name="Deskripsi" class="form-control @error('Deskripsi') is-invalid @enderror" id="Deskripsi"
                                     required autofocus value="{{(array_key_exists('Talent',$data)) ? ($data['Talent']->Deskripsi) : old('Deskripsi')}}">
                                    @error('Deskripsi')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                    <label for="Deskripsi"><i class="bi bi-person-lines-fill"></i>Deskripsi</label>
                                </div>
                                <div class="mb-3">
                                    <input name="image" class="form-control @error('image') is-invalid @enderror" type="file" id="Image">
                                @error('image')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                                </div>
                                <div class="row">
                                    <div class="col">
                                        @if (request()->is('admin'))
                                        @else
                                        <div class="d-flex mb-2">
                                            <button type="button" class="btn btn-danger ms-1" onclick="location.href='{{ route('HalamanAdmin') }}'">Cancel</button>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="col">
                                        <div class="d-flex pt-1">
                                            <button type="Submit" class="btn btn-primary flex-grow-1">Save</button>
                                        </div>
                                    </div>
                                </div>
                                    </div>
                                </div>
                            </div>
                        </div>
        </div>
</form>
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Data <b>Talents</b></h2></div>
                    <div class="col-sm-4">
                        <div class="search-box">
                            <i class="material-icons">&#xE8B6;</i>
                            <input type="text" class="form-control" placeholder="Search&hellip;">
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name<i class="fa fa-sort"></i></th>
                        <th>Deskripsi</th>
                        <th>kota<i class="fa fa-sort"></i></th>
                        <th>umur</th>
                        <th>No Telp</i></th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data['allTalent'] as $dataTalent)
                    <tr>
                        <td>{{$dataTalent->id}}</td>
                        <td>{{$dataTalent->Nama}}</td>
                        <td>{{$dataTalent->Deskripsi}}</td>
                        <td>{{$dataTalent->Alamat}}</td>
                        <td>{{$dataTalent->Umur}}</td>
                        <td>{{$dataTalent->No}}</td>
                        <td>
                            <a href="" class="view" title="View" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a>
                            <a href="/admin{{$dataTalent->id}}" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <a href="/deleteTalent/{{$dataTalent->id}}" onclick="return confirm('Are you sure?')" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                        </td>
                    </tr>

                    @empty
                        {{'Belum Ada Talent Yang Terdaftar'}}
                    @endforelse
                </tbody>
            </table>
            <div class="clearfix">
                <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                <ul class="pagination">
                    <li class="page-item disabled"><a href="#"><i class="fa fa-angle-double-left"></i></a></li>
                    <li class="page-item"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item active"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                    <li class="page-item"><a href="#" class="page-link"><i class="fa fa-angle-double-right"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection
