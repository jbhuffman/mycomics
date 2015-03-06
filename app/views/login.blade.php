<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>@yield('title', 'My Comics')</title>

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        @yield('meta')

        <!-- Stylesheets -->
        {{ HTML::style('//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.2/css/bootstrap.min.css') }}
        {{ HTML::style('//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css') }}

        @yield('styles')

        {{ HTML::style('css/dropdown.css') }}

    </head>
    <body>
        <!--@yield('navbar.prepend')
        @yield('app.navbar')
        @yield('navbar.append')-->

        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ URL::to('') }}">My Comics</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">My Comics@JaradHuffman.net</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div id="main">
            <div class="container-fluid">
                <div id="content">
                    {{ Form::open(array('url' => 'login', 'class' => 'form-horizontal')) }}
                    <!--input type="hidden" name="token" value="{{ $token }}"-->
                    <div class="col-sm-12"><h1>Login</h1></div>

                    <!-- if there are login errors, show them here -->
                    <div class="form-group">
                        {{ $errors->first('email') }}
                        {{ $errors->first('password') }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('email', 'Email Address', array('class' => 'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            {{ Form::text('email', Input::old('email'), array('class' => 'form-control', 'placeholder' => 'awesome@awesome.com')) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('password', 'Password', array('class' => 'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'password')) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <div class="checkbox">
                                <label>
                                    <input name="rememberme" type="checkbox" />Remember Me
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            {{ Form::submit('Sign in', array('class="btn btn-default')) }}
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
        <!-- Scripts -->
        {{ HTML::script('//cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js') }}

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        {{ HTML::script('//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js')}}
        <!-- Latest compiled and minified JavaScript -->
        {{ HTML::script('//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.2/js/bootstrap.min.js') }}
        <script>
            var URL = {
                'base' : '{{ URL::to('/') }}',
                'current' : '{{ URL::current() }}',
                'full' : '{{ URL::full() }}'
            };
            $('input[name="email"]').focus();
        </script>

    </body>
</html>
