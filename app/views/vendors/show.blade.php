@extends('layout')

@section('content')
    <h2>{{ $vendor->name }}</h2>
    <div class="col-md-4"><a href="{{ URL::to('vendors/create') }}">Add a Vendor</a></div>
    <div class="col-md-4 text-center"><a href="{{ URL::to('titles/create') }}">Add a Title</a></div>
    <div class="col-md-4 text-right"><a href="{{ URL::to('mybooks/create') }}">Add a Book</a></div>

    <div class="jumbotron text-left">
        <p class="text-left">
            <table>
                <tr>
                    <td><strong>Name:</strong> {{ $vendor->name }}</td>
                </tr>
                <tr>
                    <td><strong>URL:</strong> {{ $vendor->url ? HTML::link($vendor->url, $vendor->url, array('target' => '_blank')) : null }}</td>
                </tr>
            </table>
            <br />
            <a class="btn btn-small btn-info" href="{{ URL::to('vendors/' . $vendor->id . '/edit') }}">Edit</a>
        </p>
    </div>
@stop
