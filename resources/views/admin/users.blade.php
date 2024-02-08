@extends('admin.layouts')

@section('title','All Users')

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Manage <small>Users</small></h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>List of Users</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card-box table-responsive">
                                        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Registration Date</th>
                                                    <th>Name</th>
                                                    <th>Username</th>
                                                    <th>Email</th>
                                                    <th>Active</th>
                                                    <th>Edit</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($users as $user)
                                                <tr>
                                                    <td>{{ $user->created_at->format('d M Y') }}</td>
                                                    <td>{{ $user->name}}</td>
                                                    <td>{{ $user->username}}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ $user->active ? 'Yes' : 'No' }}</td>
                                                    <td>
                                                        <a href="{{ route('admin.edituser', $user->id) }}"><img src="{{ asset('images/edit.png') }}" alt="Edit"></a>
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
    <!-- /page content -->
@endsection
