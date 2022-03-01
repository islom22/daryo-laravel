@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Bu malumot qo`shuvchi sahifa
                        <a href="{{url('/category')}}" class="btn btn-info float-end">BACK</a>
                      </h4>
                </div>
                <div class="card-body">
                    <form action="{{url('add-category')}}" method="POST" >
                        @csrf
                        <div class="form-group mb-3">
                            <label for="">Malumot nomi</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-gruop mb-3">
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection