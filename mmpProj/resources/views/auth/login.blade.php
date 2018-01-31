@extends('mmpApp.mmpApp')

@section('content')
    <div id="page-title-2" class="parallax dark-bg" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="page-title">Login</h1>

                    <ul class="breadcrumb">
                        <li><a href="index.html">Home </a></li>
                        <li><a href="#">Pages</a></li>
                        <li><a href="login.html">Login</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">

            <!-- BEGIN MAIN CONTENT -->
            <div class="main col-sm-12">

                <div class="login col-sm-5 col-sm-offset-1">
                    <h1 class="center">Log in to your Account</h1>

                    <div class="col-sm-12">
                        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <div class="col-sm-2"></div>
                                <div class="col-md-8">
                                    <input id="email" type="email" class="form-control" placeholder="E-Mail Address" name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-sm-2"></div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                                <div class="col-sm-2"></div>
                                <div class="col-md-8">
                                    <input id="password" type="password" class="form-control" placeholder="Password" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-2"></div>


                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-color">
                                        Login
                                    </button>

                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        Forgot Your Password?
                                    </a>
                                </div>
                            </div>
                        </form>


                        <p class="recover-pass"> </p>

                        <div class="center"><a href="{{asset('register')}}" class="btn btn-color">Create New Account</a></div>
                    </div>


                </div>

                <div class="login-info col-sm-4 col-sm-offset-1">
                    <h1>Why should you create an account?</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse facilisis purus sed justo egestas dapibus. Etiam vel sagittis nisi. Curabitur ac egestas lorem. Sed ut odio iaculis, interdum magna non, mattis dolor. Vestibulum id dignissim elit. Cras ut scelerisque dolor.</p>

                    <h1>Lorem Ipsum Dolor</h1>
                    <p>Vestibulum rhoncus consequat aliquet. Mauris varius posuere mattis. Duis vitae molestie arcu. Curabitur sollicitudin, velit ut eleifend auctor, nibh orci pharetra risus, a malesuada nisi felis vel turpis. Aliquam fermentum nulla felis, sed molestie libero porttitor in.</p>
                </div>
            </div>
            <!-- END MAIN CONTENT -->

        </div>
    </div>
@endsection
