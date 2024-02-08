<!-- category_products.blade.php -->

@extends('admin.layouts')

@section('title', $category->name . ' Products')

@section('content')
    <div class="right_col" role="main">
        <div class="page-title">
            <div class="title_left">
                <h3>{{ $category->name }} Products</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card-box table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->description }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
