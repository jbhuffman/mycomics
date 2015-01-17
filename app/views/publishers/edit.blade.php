@extends('layout')

@section('content')
    <h1>Edit {{ $publisher->name }}</h1>

    <!-- if there are creation errors, they will show here -->
    {{ HTML::ul($errors->all()) }}

    {{ Form::model($publisher, array('route' => array('publishers.update', $publisher->id), 'method' => 'PUT')) }}

        <div class="form-group">
            {{ Form::label('name', 'Publisher') }}
            {{ Form::text('name', null, array('class' => 'form-control')) }}
        </div>

        {{ Form::submit('Edit the Publisher', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}
@stop