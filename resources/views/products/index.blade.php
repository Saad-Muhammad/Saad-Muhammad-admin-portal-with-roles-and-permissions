@extends('home')

@section('title')
	All Products
@endsection

@section('index')
<div class="content">
    <!-- Vertical Layout -->
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card card-stats">
                <div class="">
                    <h3>All Products</h3>
                    @can('product-create')
                    <a href="{{route('products.create')}}" class="btn btn-success btn-sm">Add New Product</a>
                    @endcan
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dt-mant-table">
                            <thead>
                                <tr>

                                    <th>SI</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    {{-- <th>Details</th> --}}
                                    <th width="280px">Action</th>
                        
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                <tr>

                                    <td>{{ ++$i }}</td>
                        
                                    <td>{{ $product->name }}</td>
                                    <td class="logo-image-small text-center">
                                        <img src="{{asset("storage/products/{$product->image}")}}" alt="No Image" width="100" height="100"/>
                                    </td>
                        
                                    {{-- <td>{{ $product->detail }}</td> --}}
                        
                                    <td>
                                        <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                        
                                            <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>
                        
                                            @can('product-edit')
                        
                                                <a class="btn btn-warning" href="{{ route('products.edit',$product->id) }}">Edit</a>
                        
                                            @endcan
                        
                        
                                            @csrf
                        
                                            @method('DELETE')
                        
                                            @can('product-delete')
                        
                                                 <button type="submit" class="btn btn-danger">Delete</button>
                        
                                            @endcan
                        
                                        </form>
                        
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
    <!-- #END# Vertical Layout -->
    
</div>
@endsection