@extends('layout')

@section('content')
    <h2>Vendors</h2>
    <div class="col-md-4"><a href="{{ URL::to('vendors/create') }}">Add a Vendor</a></div>
    <div class="col-md-4 text-center"><a href="{{ URL::to('titles/create') }}">Add a Title</a></div>
    <div class="col-md-4 text-right"><a href="{{ URL::to('mybooks/create') }}">Add a Book</a></div>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Vendor</th>
                <th>URL</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($vendors as $key => $value)
            <tr>
                <td>{{ $value->name }}</td>
                <td>{{ $value->url ? HTML::link($value->url, $value->url, array('target' => '_blank')) : null }}</td>
                <!-- we will also add show, edit, and delete buttons -->
                <td>
                    <!-- show the title (uses the show method found at GET /titles/{id} -->
                    <a class="btn btn-small btn-success" href="{{ URL::to('vendors/' . $value->id) }}">View</a>

                    <!-- edit this title (uses the edit method found at GET /titles/{id}/edit -->
                    <a class="btn btn-small btn-info" href="{{ URL::to('vendors/' . $value->id . '/edit') }}">Edit</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop
