@extends('templates.master_login')
@section('title', 'Login')
@section('content')
<style>
.alert_message_margins {
    margin-bottom: -16px !important;
    /* color: #000000 !important; */
}
</style>
<p>&nbsp;</p>
@include('templates.partials.alerts')
<div class="account-card-content">        
    <form class="form-horizontal m-t-30 login-form" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" class="form-control" value="{{ old('email') }}" placeholder="Example: abc@gmail.com"  autocomplete="off" autofocus required />
        </div>
        <div class="form-group"><label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Enter password" required />
        </div>
        <div class="form-group row m-t-20">
            <div class="col-sm-6">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} /> 
                    <label class="custom-control-label" for="remember">{{ __('Remember Me') }}</label>
                </div>
            </div>
        </div>
        <div class="form-group m-t-10 mb-0 row">
            <div class="col-12">
                <button class="btn w-md waves-effect waves-light btn-block btn-login" type="submit">Log In</button>
            </div>
        </div>
    </form>
</div>
@endsection
