@extends('home')

@section('title')
   User Profile
@endsection

@section('extra-css')
@endsection

@section('index')
<div class="content">
<div class="row">
    <div class="col-md-12">
        <div class="card card-user">
            <div class="image">
            <!-- <img src="../assets/img/damir-bosnjak.jpg" alt="..."> -->
            {{-- <img src="{{asset("storage/products/{$product->image}")}}" alt="No Image"/> --}}
            </div>
            <div class="card-body">
            <div class="author">
                
                <img src="{{asset("storage/products/{$product->image}")}}" alt="No Image" class="avatar border-gray"/>
                <!-- <img class="avatar border-gray" src="../assets/img/mike.jpg" alt="..."> -->
                <h5 class="title text-primary">{{$product->name }}</h5>
                
            </div>
            <p class="description text-center">
                {{ $product->detail }}           
             </p>
            </div>

        </div>
    </div>
</div>
</div>
@endsection
