@extends('account.layouts.default') 

@section('account.content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Update Password</div>

                <div class="card-body">
                    <form action="{{ route("account.password.store") }}" method="POST" novalidate>
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="password_current">Current Password</label>
                            <input 
                                type="password" 
                                class="form-control {{ $errors->has('password_current') ? 'is-invalid' : ''}}" 
                                id="password_current" 
                                name="password_current"
                                placeholder="Enter password current">
                                @if ($errors->has('password_current'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('password_current') }}
                                    </div>                                    
                                @endif
                        </div>                   
                        
                        <div class="form-group">
                            <label for="password">New Password</label>
                            <input 
                                type="password" 
                                class="form-control {{ $errors->has('password') ? 'is-invalid' : ''}}" 
                                id="password" 
                                name="password"
                                placeholder="Enter password current">
                                @if ($errors->has('password'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('password') }}
                                    </div>                                    
                                @endif
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">New Password again</label>
                            <input 
                                type="password" 
                                class="form-control" 
                                id="password_confirmation" 
                                name="password_confirmation"
                                placeholder="Enter password current">                                
                        </div>

                        <button type="submit" class="btn btn-primary">Change Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection