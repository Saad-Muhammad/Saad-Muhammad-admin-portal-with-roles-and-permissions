@extends('home')

@section('title')
	Create Product
@endsection

@section('index')
        <div class="content">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="">
                            <h3>
                                Add New Product
                            </h3>
                        </div>
                        <div class="card-body">
                            <form id="form_validation" method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                                 @csrf
                                 <div class="form-group ">
                                    <strong class="form-label">Name</strong>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')}}" placeholder="Product Name" required autofocus>
                                    @error('name')
                                        <label id="name-error" class="error" for="name">{{ $message }}</label>
                                    @enderror
                                </div>
                
                                <div class="form-group">
                                    <strong>Detail:</strong>
                                    <textarea class="form-control @error('detail') is-invalid @enderror" style="height:150px" value="{{old('detail')}}" name="detail" placeholder="Product Detail"></textarea>
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
                
                                <button class="btn btn-primary btn-sm" type="submit">SUBMIT</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('extra-script')

@endsection
