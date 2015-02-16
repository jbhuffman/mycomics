@extends('layout')

@section('content')
    <h2>Add a Vendor</h2>

    <!-- if there are creation errors, they will show here -->
    {{ HTML::ul($errors->all()) }}

    {{ Form::open(array('url' => 'vendors')) }}
        <input type="hidden" name="token" value="{{ $token }}">

        <div class="form-group">
            {{ Form::label('name', 'Vendor') }}
            {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('url', 'URL') }}
            {{ Form::text('url', Input::old('url'), array('class' => 'form-control')) }}
        </div>

        {{ Form::submit('Add the Vendor!', array('class' => 'btn btn-primary')) }}
        {{ HTML::linkRoute('vendors.index', 'Cancel', array(), array('class' => 'btn btn-default')) }}

    {{ Form::close() }}
@stop
