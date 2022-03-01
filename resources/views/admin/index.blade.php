@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6">
          <h4><a href="{{ url('/admin') }}">News</a></h4>
        </div>
        <div class="col-md-6">
          <h4><a href="{{ url('/category') }}">Category</a></h4>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Bu malumotlar ro`yhati
                        <a href="{{url('/add-refrence')}}" class="btn btn-primary float-end">Malumot qo`shish</a>
                      </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                          <tr>
                              <th>Id</th>
                              <th>Sarlavha</th>
                              <th>Matn</th>
                              <th>Rasm</th>
                              <th>Category</th>
                              <th>Amallar</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($admin as $item)
                              <tr>
                                  <td>{{$item->id}}</td>
                                  <td>{{$item->title}}</td>
                                  <td>{{$item->text}}</td>
                                  <td>
                                      <img src="{{asset('/uploads/admins/'.$item->profile_image)}}" alt="Image" width="70px" height="70px">
                                  </td>
                                  <td>{{$item->category->name}}</td>
                                  <td>
                                      <div>
                                          <div class="container">
                                              <div class="row">
                                                  <div class="col-md-6">
                                                    <a href="{{url('/edit-refrence/'.$item->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                                  </div>
                                                  <div class="col-md-6">
                                                    <form action="{{ url('/delete-refrence/'.$item->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                       <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                                    </form>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                </td>
                              </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection