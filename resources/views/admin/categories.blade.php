<!-- index.blade.php -->
@extends('admin.layouts')

@section('title', 'All Categories')

@section('content')
    <div class="right_col" role="main">
        <div class="page-title">
            <div class="title_left">
                <h3>Manage Categories</h3>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>List of Categories</h2>
                        </div>
                        <div class="x_content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card-box table-responsive">
                                        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Category Name</th>
                                                    <th>Edit</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($categories as $category)
                                                    <tr>
                                                        <td><a href="{{ route('admin.categories.products', $category->id) }}">{{ $category->name }}</a></td>
                                                        <td>
                                                            <a href="{{ route('admin.categories.edit', $category->id) }}">
                                                                <img src="{{ asset('images/edit.png') }}" alt="Edit">
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit">
                                                                    <img src="{{ asset('images/delete.png') }}" alt="Delete">
                                                                </button>
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
                </div>
            </div>
        </div>
    </div>
@endsection
