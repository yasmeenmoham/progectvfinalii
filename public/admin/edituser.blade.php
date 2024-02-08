@extends('admin.layouts')

@section('title','Edit User')

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Edit User</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_content">
                            <br />
                            <form id="edit-user-form" action="{{ route('admin.users.update', $user->id) }}" method="POST" data-parsley-validate class="form-horizontal form-label-left">
                                @csrf
                                @method('PUT')

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Full Name <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" id="name" name="name" required class="form-control" value="{{ $user->name }}">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="username">Username <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" id="username" name="username" required class="form-control" value="{{ $user->username }}">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Email <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input id="email" name="email" class="form-control" type="email" required value="{{ $user->email }}">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="password">Password <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="password" id="password" name="password" required class="form-control">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Active</label>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" class="flat" name="active" {{ $user->active ? 'checked' : '' }}>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="item form-group">
                                    <div class="col-md-6 col-sm-6 offset-md-3">
                                        <button class="btn btn-primary" type="button" onclick="window.location='{{ route('admin.users.index') }}';">Cancel</button>
                                        <button type="submit" class="btn btn-success">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->
@endsection
