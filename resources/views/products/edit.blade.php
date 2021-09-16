@extends('home')

@section('title')
    Edit Product
@endsection

@section('index')
        <div class="content">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="">
                            <h3>
                                Edit Product
                            </h3>
                        </div>
                        <div class="body">
                           <form id="form_validation" method="POST" action="{{ route('products.update',$product->id) }}" enctype="multipart/form-data">
                            @csrf
                            <input name="_method" type="hidden" value="PUT">
                            <div class="form-group ">
                                    <strong class="form-label">Name</strong>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$product->name}}" placeholder="Username" required autofocus>
                                    @error('name')
                                        <label id="name-error" class="error" for="name">{{ $message }}</label>
                                    @enderror
                                </div>

                                <div class="form-group ">
                                    <strong>Detail:</strong>
                                    <textarea class="form-control @error('detail') is-invalid @enderror" style="height:150px" value="" name="detail" placeholder="Product Detail">{{$product->detail}}</textarea>
                                    @error('detail')
                                         <label id="detail-error" class="error" for="detail">{{ $message }}</label>
                                     @enderror

                                </div>
                                <div class="form-group ">
                                    <strong class="form-label">Product Image</strong>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                                    @error('image')
                                        <label id="image-error" class="error" for="image">{{ $message }}</label>
                                    @enderror
                                </div>
                                <button class="btn btn-primary btn-sm" type="submit">UPDATE</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Vertical Layout -->

        </div>
@endsection

@section('extra-script')
@endsection
