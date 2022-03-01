@extends('layouts.app')

@section('content')
<thead>
    <div class="container" style="background-color: #e3f2fd;">
        <div class="row py-2">
            <div class="col-md-3">
             <h4>Daryo.uz</h4>
            </div>
            <div class="col-md-9 " style="background-color: #e3f2fd;">
                <div class="row">
                    @foreach ($categories as $category)
                        <div class="col-md-3 "><h4><a href="{{ url('/category/'.$category->id) }} " class="text-decoration-none" >{{$category->name}}</a></h4></div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</thead>
<hr>
<tbody>
    <div class="container">
        <div class="row py-2 px-2">
               @foreach ($admin as $item)
            <div class="col-md-4 mb-2  ">
               <div class="card py- 2 px-2 mb-4">
                    <a href="{{ url('/shows/'.$item->id) }}" class="text-decoration-none mb-2">
                        <img src="{{asset('uploads/admins/'.$item->profile_image)}}" class="py-1 px-1" alt="Image" width="380px" height="250px">
                    </a>
                 <h5><a href="{{ url('/shows/'.$item->id) }}" class="text-decoration-none">{{ $item->title }}</a></h5>   
                 <p> {{ $item->text }}</p>
               </div>
            </div>
               @endforeach
            </div>
        </div>
    </div>
</tbody>
@endsection

