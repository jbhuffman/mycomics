@extends('layout')

@section('content')
    <h2>Add a Publisher</h2>

    <!-- if there are creation errors, they will show here -->
    {{ HTML::ul($errors->all()) }}

    {{ Form::open(array('url' => 'publishers')) }}

        <div class="form-group">
            {{ Form::label('name', 'Publisher') }}
            {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
        </div>

        {{ Form::submit('Add the Publisher!', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}
@stop