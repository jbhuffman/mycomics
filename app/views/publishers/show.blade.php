@extends('layout')

@section('content')
{{{ $publisher }}}
    <h2>{{ $publisher->name }} ({{ count($titles) }})</h2>
    <div class="col-md-4 text-left"><a href="{{ URL::to('titles/create') }}">Add a Title</a></div>
    <div class="col-md-4 text-right"><a href="{{ URL::to('mybooks/create') }}">Add a Book</a></div>

    <div class="jumbotron text-left">
        <p class="text-left">
            <table>
                <tr>
                    <td><strong>Name:</strong> {{ $publisher->name }}</td>
                </tr>
            </table>
            <br />
            <a class="btn btn-small btn-info" href="{{ URL::to('publishers/' . $publisher->id . '/edit') }}">Edit</a>
        </p>
        <p>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Issues</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
    @foreach($titles as $key => $title)
                    <tr>
                        <td>{{ $title->title }}</td>
                        <td>{{ count($title->mybooks) }}</td>
                        <td class="text-left">
                            <!-- show the title (uses the show method found at GET /mybooks/{id} -->
                            <a class="btn btn-small btn-success" href="{{ URL::to('titles/' . $title->id) }}">View</a>

                            <!-- edit this title (uses the edit method found at GET /mybooks/{id}/edit -->
                            <a class="btn btn-small btn-info" href="{{ URL::to('titles/' . $title->id . '/edit') }}">Edit</a>
                        </td>
                    </tr>
    @endforeach
                </tbody>
            </table>
        </p>
    </div>
@stop