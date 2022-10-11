@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-primary">
                <h1>Products</h1>
            </div>
        </div>
        <div class="col-md-12 my-3">
            <a href="{{ route('products.create') }}" class="btn btn-success">Add product</a>
        </div>
        <div class="col-lg-12">

            @if ($success = Session::get('success'))
                <div class="alert alert-success">
                    {{ $success }}
                </div>
            @endif


            <table class="table table-bordered">
                <tr>
                    <th>No.</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Product amount</th>
                    <th>Product Detail</th>
                    <th width="150px">Action</th>
                </tr>

                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ number_format($product->price,2) }}</td>
                        <td>{{ $product->amount }}</td>
                        <td>{{ $product->detail }}</td>
                        <td>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST">

                                @csrf
                                @method('DELETE')
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>

                    </tr>
                @endforeach

            </table>

            {!! $products->links('pagination::bootstrap-5') !!}
        </div>
    </div>
@endsection
