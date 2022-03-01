@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if (session('status'))
                <h6 class="alert alert-success">{{session('status')}}</h6>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>Bu malumotni o`zgartiruvchi sahifa
                        <a href="{{url('/admin')}}" class="btn btn-danger float-end">BACK</a>
                      </h4>
                </div>
                <div class="card-body">
                    <form action="{{url('update-refrence/'.$admin->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label for="">Malumot satri</label>
                            <input type="text" name="title" value="{{$admin->title}}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Malumot matni</label>
                            <input type="text" name="text" value="{{$admin->text}}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Malumot rasmi</label>
                            <input type="file" name="profile_image" class="form-control">
                            <img src="{{asset('uploads/admins/'.$admin->profile_image)}}" alt="Image" width="70px" height="70px">
                        </div>
                        <div class="form-group mb-3">
                            <select class="form-control" name="category_id" id="exampleFormControlSelect1">
                                @foreach ($catigories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-gruop mb-3">
                            <button class="btn btn-primary" type="submit">Update refrence</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection