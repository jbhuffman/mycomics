@extends('layout')

@section('content')
    <h2>{{ $title->title }} ({{ count($issues) }})</h2>
    <div class="col-md-6 text-left"><a href="{{ URL::to('titles/create') }}">Add a Title</a></div>
    <div class="col-md-6 text-right"><a href="{{ URL::to('mybooks/create') }}">Add a Book</a></div>

    <div class="jumbotron text-center">
        <p class="text-left">
            <strong>Publisher:</strong> {{ $title->publisher->name }}<br />
            <table>
                <tr>
                    <td><strong>Time Frame:</strong> {{ $title->time_frame }}</td>
                    <td><strong>Series Type:</strong> {{ $title->series_type }}</td>
                </tr>
                <tr>
                    <td>
    @if (isset($title->main_issues))
                    <strong>Main Issues:</strong> {{ $title->main_issues }}
    @endif
                    </td>
                    <td>
    @if (isset($title->annuals))
                    <strong>Annuals:</strong> {{ $title->annuals }}
    @endif
                    </td>
                </tr>
                <tr>
                    <td>
    @if (isset($title->specials))
            <strong>Specials:</strong> {{ $title->specials }}
    @endif
                    </td>
                    <td>
    @if (isset($title->missing_issues))
            <strong>Missing Issues:</strong> {{ $title->missing_issues }}
    @endif
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
    @if (isset($title->comments))
            <strong>Comments:</strong> {{ $title->comments }}
    @endif
                    </td>
                </tr>
                <tr>
                    <td>
    @if ($title->is_active == 'Yes')
            <strong>Active</strong>
    @endif
                    </td>
                    <td>
    @if ($title->is_complete == 'Yes')
            <strong>Complete</strong>
    @endif
                    </td>
                </tr>
                <tr>
                    <td>
    @if ($title->is_subscribed == 'Yes')
            <strong>Subscribed</strong>
    @endif
                    </td>
                    <td>
    @if ($title->is_deleted == 'Yes')
            <strong>Deleted</strong>
    @endif
                    </td>
                </tr>
                <tr>
                    <td>
    @if (isset($title->created))
            <strong>Created:</strong> {{ $title->created }}
    @endif
                    </td>
                    <td>
    @if (!empty($title->modified))
            <strong>Modified:</strong> {{ $title->modified }}
    @endif
                    </td>
                </tr>
            </table>
        </p>
        <p>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Issue</th>
                        <th>Released</th>
                        <th>Printing</th>
                        <th>Condition</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
    @foreach($issues as $key => $issue)
                    <tr>
                        <td>{{ $issue->issue }}</td>
                        <td>{{ $issue->released }}</td>
                        <td>{{ $issue->printing }}</td>
                        <td>{{ $issue->condition }}</td>
                        <td>
                            <!-- delete the title (uses the destroy method DESTROY /mybooks/{id} -->
                            {{ Form::open(array('url' => 'mybooks/' . $issue->id, 'class' => 'pull-right')) }}
                                {{ Form::hidden('_method', 'DELETE') }}
                                {{ Form::submit('Delete', array('class' => 'btn btn-warning delete-button')) }}
                            {{ Form::close() }}

                            <!-- show the title (uses the show method found at GET /mybooks/{id} -->
                            <a class="btn btn-small btn-success pull-left" href="{{ URL::to('mybooks/' . $issue->id) }}">View</a>

                            <!-- edit this title (uses the edit method found at GET /mybooks/{id}/edit -->
                            <a class="btn btn-small btn-info" href="{{ URL::to('mybooks/' . $issue->id . '/edit') }}">Edit</a>
                        </td>
                    </tr>
    @endforeach
                </tbody>
            </table>
        </p>
    </div>
@stop
