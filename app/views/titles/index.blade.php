@extends('layout')

@section('styles')
    {{ HTML::style('//cdnjs.cloudflare.com/ajax/libs/datatables/1.10.5/css/jquery.dataTables.min.css') }}
@stop

@section('scripts')
    {{ HTML::script('//cdnjs.cloudflare.com/ajax/libs/datatables/1.10.5/js/jquery.dataTables.min.js') }}
    {{ HTML::script('js/titles/index.js') }}
@stop

@section('content')
    <h2>My Titles ({{ count($titles) }})</h2>
    @if (Auth::check())
    <div class="col-md-6"><a href="{{ URL::to('titles/create') }}">Add a Title</a></div>
    <div class="col-md-6 text-right"><a href="{{ URL::to('mybooks/create') }}">Add a Book</a></div>
    @endif

    <table id="titles" class="table table-striped table-condensed table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Publisher</th>
                <th>Issues</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($titles as $key => $value)
            <tr>
                <td>{{ $value->title }}</td>
                <td>{{ $value->publisher->name }}</td>
                <td>{{ count($value->mybooks) }}</td>

                <!-- we will also add show, edit, and delete buttons -->
                <td>
                    <!-- show the title (uses the show method found at GET /titles/{id} -->
                    <a class="btn btn-small btn-success" href="{{ URL::to('titles/' . $value->id) }}">View</a>

                    @if (Auth::check())
                    <!-- edit this title (uses the edit method found at GET /titles/{id}/edit -->
                    <a class="btn btn-small btn-info" href="{{ URL::to('titles/' . $value->id . '/edit') }}">Edit</a>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop
