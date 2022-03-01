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
                    <h4>Bu malumot qo`shuvchi sahifa
                        <a href="{{url('/admin')}}" class="btn btn-info float-end">BACK</a>
                      </h4>
                </div>
                <div class="card-body py-4">
                    <form action="{{url('add-refrence')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="">Malumot satri</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Malumot matni</label>
                            <textarea type="text" name="text" id="'article-ckeditor'" class="form-control" cols="50" rows="5"></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Malumot rasmi</label>
                            <input type="file" name="profile_image" class="form-control">
                        </div>
                        <div >
                            <select class="form-control" name="category_id" id="exampleFormControlSelect1">
                                @foreach ($catigories as $category)
                                    <option value="{{$category->id}}" >{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-gruop mb-3 py-2">
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection