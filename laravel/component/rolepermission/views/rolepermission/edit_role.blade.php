@extends('layouts/backendlayout/master')
@section('content')
<div class="wrapper">
    <!-- Left side column. contains the logo and sidebar -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
            Role & Permission Setup
            <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Role & Permission</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="col-md-2">
                <!-- general form elements -->
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">Update Roles</h3>
                    </div>
                    <div class="box-body">
                        <form role="form" action="{{url('role-permission/role/update/'.$role['id'])}}" method="post" enctype="multipart/form-data">
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <label for="exampletextinput1" {{ $errors->has('name') ? ' has-error' : '' }}>Role Name:</label>
                                <input type="text" class="form-control" id="exampletextinput1"
                                placeholder="Enter Name" name="name" value="{{$role['name']}}" required>
                                @if ($errors->has('name'))
                                <span class="help-block" style="color: #cc0000">
                                    <strong> * {{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary btn-flat btn-sm">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>

                
            
        </section>
    </div>
</div>
@endsection