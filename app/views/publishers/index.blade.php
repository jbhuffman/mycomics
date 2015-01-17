@extends('layout')

@section('content')
    <h2>Publishers</h2>
    <div class="col-md-4"><a href="{{ URL::to('publishers/create') }}">Add a Publisher</a></div>
    <div class="col-md-4 text-center"><a href="{{ URL::to('titles/create') }}">Add a Title</a></div>
    <div class="col-md-4 text-right"><a href="{{ URL::to('mybooks/create') }}">Add a Book</a></div>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Publisher</th>
                <th>Titles</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($publishers as $key => $value)
            <tr>
                <td>{{ $value->name }}</td>
                <td>{{ count($value->titles) }}</td>

                <!-- we will also add show, edit, and delete buttons -->
                <td>
                    <!-- show the title (uses the show method found at GET /titles/{id} -->
                    <a class="btn btn-small btn-success" href="{{ URL::to('publishers/' . $value->id) }}">View</a>

                    <!-- edit this title (uses the edit method found at GET /titles/{id}/edit -->
                    <a class="btn btn-small btn-info" href="{{ URL::to('publishers/' . $value->id . '/edit') }}">Edit</a>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop