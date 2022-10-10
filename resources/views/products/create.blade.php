@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-7">
            <div class="alert alert-secondary">
                <h2>Create Product</h2>
            </div>
        </div>
        <div class="col-md-12 my-3">
            <a href="{{ route('products.index') }}" class="btn btn-danger">Back</a>
        </div>

        <div class="col-md-12">
            @if ($error = Session::get('error'))
                <div class="alert alert-danger">
                    {{ $error }}
                </div>
            @endif
        </div>

        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-md-6 my-3">
                <div class="form-group">
                    <strong>Product Name: </strong>
                    <input type="text" name="name" class="form-control" placeholder="Product Name">
                </div>
            </div>
            <div class="col-md-6 my-3">
                <div clsass="form-group">
                    <strong>Product Price: </strong>
                    <input type="number" name="price" class="form-control" placeholder="Product Price">
                </div>
            </div>
            <div class="col-md-6 my-3">
                <div class="form-group">
                    <strong >Product Amount: </strong>
                    <input type="number" name="amount" class="form-control" placeholder="Product Amount">
                </div>
            </div>
            <div class="col-md-6 my-3">
                <div class="form-group">
                    <strong >Product Detail: </strong>
                    <input type="text" name="detail" class="form-control" placeholder="Product Detail">
                </div>
            </div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary">Create product</button>
            </div>
        </form>
    </div>
@endsection
