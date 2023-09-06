@extends('templates.master')
@section('title', 'Add New '.$singulartitle)

@section('content')
<div class="content">
    @include('templates.partials.alerts')
    <section class="stat-container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="h4 my-md-4 my-3">{{ "Add New ".$singulartitle }}</h4>
                </div>
                <div class="col-md-6 text-md-right pt-md-4 pr-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route($home_path) }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ "Add New ".$singulartitle }}</li>
                    </ol>
                </div>
            </div>
            <!-- end row -->
        </div>
    </section>
    <section class="report-listing">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 px-0">
                    <form name="form1" id="form1" action="{{ route($route_path.'.store') }}" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            @csrf
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="name">Name: <span class="mandatory_style">*</span></label>
                                            <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control" placeholder="Type the Name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email Address: <span class="mandatory_style">*</span></label>
                                            <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control" placeholder="Type the Email Address" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password: <span class="mandatory_style">*</span></label>
                                            <input type="password" name="password" id="password" value="{{ old('password') }}" class="form-control" placeholder="Type the Password" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="confirmpassword">Confirm Password: <span class="mandatory_style">*</span></label>
                                            <input type="password" name="confirmpassword" id="confirmpassword" value="{{ old('confirmpassword') }}" class="form-control" placeholder="Type the Confirm Password" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        
                                        <div class="form-group">
                                            <label for="cnic">User Access Level: <span class="mandatory_style">*</span></label>
                                            <select name="roles" id="roles" class="form-control">
                                                <option value="">Please select the User Roles</option>
                                                @foreach($result_roles as $key => $row)
                                                    <option value="{{ $row->id }}">{{ $row->display_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="meta_desc">Status: <span class="mandatory_style">*</span></label>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" name="status" class="custom-control-input" id="customControlValidation1" value="1" checked required>
                                                <label class="custom-control-label" for="customControlValidation1">Active</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" name="status" class="custom-control-input" id="customControlValidation2" value="0" required>
                                                <label class="custom-control-label" for="customControlValidation2">In Active</label>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="border-top">
                                        <div class="card-body">
                                            <input type="submit" name="form_submit" id="form_submit" class="btn btn-primary" value="Submit">
                                            <a href="{{ route($home_path) }}" class="btn btn-danger">Cancel</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- container-fluid -->
    </section>		   
</div>
<script>
    $().ready(function() {
        $("#form1").validate({
			rules: {
				name: "required",
				email: {
					required: true,
					email: true
				},
                password: {
					required: true,
					minlength: 5
				},
				confirmpassword: {
					required: true,
					minlength: 5,
					equalTo: "#password"
				},
                roles: "required",
			},
			messages: {
				name: "Please enter the name",
				email: "Please enter the valid email address",
				password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 5 characters long"
				},
				confirmpassword: {
					required: "Please provide a password",
					minlength: "Your password must be at least 5 characters long",
					equalTo: "Please enter the same password as above"
				},
                roles: "Please select the User Role",
			}
		});
    });
</script>
@endsection
