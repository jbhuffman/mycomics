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
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="/">Home</a></li>
                        <li><a href="{{ URL::to('about') }}">About</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                My Books
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ URL::to('mybooks') }}">View All Books</a></li>
                                @if (Auth::check())
                                <li><a href="{{ URL::to('mybooks/create') }}">Add a Book</a></li>
                                @endif
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                Titles
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ URL::to('titles') }}">View All</a></li>
                                @if (Auth::check())
                                <li><a href="{{ URL::to('titles/create') }}">Add Title</a></li>
                                @endif
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Maintenance <span class="caret"></span></a>
                            <ul class="dropdown-menu multi-level">
                                <li class="dropdown-submenu">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Publishers</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ URL::to('publishers') }}">View All</a></li>
                                        @if (Auth::check())
                                        <li><a href="{{ URL::to('publishers/create') }}">Add Publisher</a></li>
                                        @endif
                                    </ul>
                                </li>
                                <li class="divider"></li>
                                <li class="dropdown-submenu">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Vendors</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ URL::to('vendors') }}">View All</a></li>
                                        @if (Auth::check())
                                        <li><a href="{{ URL::to('vendors/create') }}">Add Vendor</a></li>
                                        @endif
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div id="main">
            <div class="container-fluid">
                @yield('main.prepend')

                <div id="content">
                    @yield('content')
                </div>

                <div id="sidebar">
                    @yield('sidebar')
                </div>

                @yield('main.append')
            <!--
            will be used to show any messages --
            @if (Session::has('message'))
                <div class="alert alert-info">{{ Session::get('message') }}</div>
            @endif
            -->
            </div>
        </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        {{ HTML::script('//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js')}}
        <!-- Latest compiled and minified JavaScript -->
        {{ HTML::script('//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.2/js/bootstrap.min.js') }}

        @yield('scripts')
        <!-- my scripts -->

    </body>
</html>
