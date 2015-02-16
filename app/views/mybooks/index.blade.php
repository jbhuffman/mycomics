@extends('layout')

@section('content')
    <h2>My Books ({{ count($mybooks) }})</h2>
    @if (Auth::check())
    <div class="col-md-6"><a href="{{ URL::to('titles/create') }}">Add a Title</a></div>
    <div class="col-md-6 text-right"><a href="{{ URL::to('mybooks/create') }}">Add a Book</a></div>
    @endif

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Issue</th>
                <th>Released</th>
                <th>Printing</th>
                <th>Condition</th>
                <th>Comments</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($mybooks as $key => $value)
            <tr>
                <td><a href="{{ URL::to('titles/' . $value->titleid) }}">{{ $value->title->title }}</a></td>
                <td>{{ $value->issue }}</td>
                <td>{{ $value->released }}</td>
                <td>{{ $value->printing }}</td>
                <td>{{ $value->condition }}</td>
                <td>{{ $value->comments }}</td>

                <!-- we will also add show, edit, and delete buttons -->
                <td>
                    @if (Auth::check())
                    <!-- delete the title (uses the destroy method DESTROY /titles/{id} -->
                    {{ Form::open(array('url' => 'mybooks/' . $value->id, 'class' => 'pull-right')) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::submit('Delete', array('class' => 'btn btn-warning delete-button')) }}
                    {{ Form::close() }}
                    @endif

                    <!-- show the title (uses the show method found at GET /titles/{id} -->
                    <a class="btn btn-small btn-success" href="{{ URL::to('mybooks/' . $value->id) }}">View</a>

                    @if (Auth::check())
                    <!-- edit this title (uses the edit method found at GET /titles/{id}/edit -->
                    <a class="btn btn-small btn-info" href="{{ URL::to('mybooks/' . $value->id . '/edit') }}">Edit</a>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop
