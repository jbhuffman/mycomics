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

        <!-- Scripts -->
        {{ HTML::script('//cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js') }}
        <script>
            var URL = {
                'base' : '{{ URL::to('/') }}',
                'current' : '{{ URL::current() }}',
                'full' : '{{ URL::full() }}'
            };
        </script>
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
                    <h1>Login</h1>

                    <!-- if there are login errors, show them here -->
                    <div class="form-group">
                        {{ $errors->first('email') }}
                        {{ $errors->first('password') }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('email', 'Email Address') }}
                        {{ Form::text('email', Input::old('email'), array('placeholder' => 'awesome@awesome.com')) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('password', 'Password') }}
                        {{ Form::password('password') }}
                    </div>

                    <p>{{ Form::submit('Submit!') }}</p>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </body>
</html>
