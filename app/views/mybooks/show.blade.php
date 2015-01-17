@extends('layout')

@section('content')
    <h2>Book :: {{ $mybook->title->title }}</h2>

    <div class="jumbotron text-left">
        <p>
            <strong>Issue:</strong> {{ $mybook->issue }}<br />
            <strong>Printing:</strong> {{ $mybook->printing }}<br />
    @if (!empty($mybook->condition))
            <strong>Condition:</strong> {{ $mybook->condition }}<br />
    @endif
    @if (!empty($mybook->released))
            <strong>Released:</strong> {{ date('m/d/Y', strtotime($mybook->released)) }}<br />
    @endif
    @if (!empty($mybook->comments))
            <strong>Comments:</strong> {{ $mybook->comments }}<br />
    @endif
    @if (!empty($mybook->vendor))
            <strong>Vendor:</strong> {{ $mybook->vendor }}<br />
    @endif
    @if (isset($mybook->created))
            <strong>Created:</strong> {{ $mybook->created }}<br />
    @endif
    @if (!empty($mybook->modified))
            <strong>Modified:</strong> {{ $mybook->modified }}<br />
    @endif
            <br />
            <a class="btn btn-small btn-info" href="{{ URL::to('mybooks/' . $mybook->id . '/edit') }}">Edit</a>
        </p>
    </div>
@stop