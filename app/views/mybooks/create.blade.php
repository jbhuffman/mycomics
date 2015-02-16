@extends('layout')

@section('content')
    <h2>Add a Book</h2>

    <!-- if there are creation errors, they will show here -->
    {{ HTML::ul($errors->all()) }}

    {{ Form::open(array('url' => 'mybooks', 'method' => 'POST')) }}
        {{ Form::token() }}

        <div class="form-group">
            {{ Form::label('titleid', 'Title') }}
            {{ Form::select('titleid', $titles, Input::old('titleid'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('issue', 'Issue') }}
            {{ Form::text('issue', Input::old('issue'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('printing', 'Printing') }}
            {{ Form::text('printing', Input::old('printing', '1st'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('condition', 'Condition') }}
            {{ Form::select('condition', array('mint' => 'Mint', 'near mint' => 'Near Mint', 'very fine' => 'Very Fine', 'fine' => 'Fine', 'very good' => 'Very Good', 'good' => 'Good', 'fair' => 'Fair', 'poor' => 'Poor'), Input::old('condition', 'near mint'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('released', 'Released') }}
            {{ Form::text('released', Input::old('released'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('is_special', 'Is Special?') }}
            {{ Form::checkbox('is_special', Input::old('is_special'), null, array('class' => 'checkbox')) }}
        </div>

        <div class="form-group">
            {{ Form::label('comments', 'Comments') }}
            {{ Form::textarea('comments', Input::old('comments'), array('class' => 'form-control', 'rows' => '2')) }}
        </div>

        {{ Form::submit('Add the Book', array('class' => 'btn btn-primary')) }}
        {{ HTML::linkRoute('mybooks.index', 'Cancel', array(), array('class' => 'btn btn-default')) }}

    {{ Form::close() }}
@stop
