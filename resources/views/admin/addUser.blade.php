@extends('admin.layouts')

@section('title','Add User')

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Manage Users</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Add User</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br />
                            <form id="add-user-form" data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{ route('admin.users.store') }}">
                                @csrf

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Full Name <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" id="first-name" name="name" required="required" class="form-control">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="user-name">Username <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" id="user-name" name="username" required="required" class="form-control">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label for="email" class="col-form-label col-md-3 col-sm-3 label-align">Email <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input id="email" class="form-control" type="email" name="email" required="required">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Active</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="checkbox" class="flat" name="active">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="password">Password <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="password" id="password" name="password" required="required" class="form-control">
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="item form-group">
                                    <div class="col-md-6 col-sm-6 offset-md-3">
                                        <button class="btn btn-primary" type="button">Cancel</button>
                                        <button type="submit" class="btn btn-success">Add</button>
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
