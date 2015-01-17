@extends('layout')

@section('content')
    @foreach($titles as $title)
        <p>{{ $title->title }}</p>
    @endforeach
@stop
