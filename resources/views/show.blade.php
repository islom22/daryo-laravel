@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-12">   
                <div >
                    <form action="{{url('/shows')}}" method="POST" >
                        @csrf
                        <div class="container">
                            <div class="row py-2">
                                  <div class="col-md-12">
                                    <img src="{{asset('/uploads/admins/'.$item->profile_image)}}" alt="Image" width="100%" height="600px">
                                 
                                      <h2>{{ $item->title }}</h2>
                                      <p>{{ $item->text }}</p>
                                  </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="mb-4">
                      <h4>
                        <a href="{{url('/main')}}" class="btn btn-info float-end">Asosiy yangiliklar</a>
                      </h4>
                </div>
        </div>
    </div>
</div>


@endsection