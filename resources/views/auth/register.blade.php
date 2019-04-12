@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/login') }}">SignIn</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('register') }}">Register</a>
                    </li>
                </ul>
                <div class="panel-heading"></div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/login') }}">SignIn</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('register') }}">Register</a>
                        </li>
                    </ul>
                    <div class="card-header">{{ __('') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ url('/register') }}">
                            {{ csrf_field() }}
    
                            <div class="form-group row">
                                <div class="col">
                                    <label for="name" >{{ __('User Name') }}</label>
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col">
                                    <label for="email" >{{ __('Email') }}</label>
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <div class="col">
                                    <label for="password" >{{ __('Password') }}</label>  
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col">
                                    <label for="password-confirm" >{{ __('Confirm Password') }}</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>    
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <div class="col">
                                    <label for="contactFirstName">First Name:</label>
                                    <input type="text" id="contactFirstName" name="contactFirstName" placeholder="First Name" class="form-control" required>    
                                </div>
                                <div class="col">
                                    <label for="contactMName">Middle Name:</label>
                                    <input type="text" id="contactMName" name="contactMName" placeholder="Middle Name" class="form-control">    
                                </div>
                                <div class="col">
                                    <label for="contactLastName">Last Name:</label>
                                    <input type="text" id="contactLastName" name="contactLastName" placeholder="Last Name" class="form-control" required>    
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <div class="col">
                                    <br>
                                    <div class="col-center">
                                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label for="remember">Are You a Student?</label>
                                    </div>
                                </div>                        
                                <div class="col">
                                    <label for="studentIdNumber">Student ID</label>
                                    <input type="text" id="studentIdNumber" name="studentIdNumber" placeholder="ID Number" class="form-control" required>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <div class="col">
                                    <label for="addressLine1">Address</label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col">
                                    <input type="text" id="addressLine1" name="addressLine1" placeholder="Address Line 1" class="form-control" required>    
                                </div>
                                <div class="col">
                                    <input type="text" id="addressLine2" name="addressLine2" placeholder="Address Line 2" class="form-control" required>    
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <div class="col">
                                    <label for="city">City</label>
                                    <input type="text" id="city" name="city" placeholder="City" class="form-control">
                                </div>
                                <div class="col">
                                    <label for="parish">Parish</label>
                                    <input type="text" id="parish" name="parish" placeholder="Parish" class="form-control">    
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col">
                                    <label for="country">Country</label>
                                    <input type="text" id="country" name="country" placeholder="Country" class="form-control">        
                                </div>
                                <div class="col">
                                    <label for="email">Location</label>
                                    <select name="officeCode" class="form-control" required>
                                        <option selected>Select Campus</option>
                                        <option value="1">Papine Campus</option>
                                        <option value="2">Arther Wint Campus</option>
                                        <option value="3">Slip Road Campus</option>
                                        <option value="4">Montego Bay Campus</option>
                                    </select> 
                                </div>
                            </div>
                            <br><br>
                            <div class="form-group row mb-0">
                                <div class="col">
                                    <input type="submit" class="btn btn-primary" value='Register'>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
