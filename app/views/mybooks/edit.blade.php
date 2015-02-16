@extends('layout')

@section('content')
    <h2>Edit {{ $mybook->title->title }}</h2>

    <!-- if there are creation errors, they will show here -->
    {{ HTML::ul($errors->all()) }}

    {{ Form::model($mybook, array('route' => array('mybooks.update', $mybook->id), 'method' => 'PUT')) }}
        {{ Form::token() }}

        <div class="form-group">
            {{ Form::label('titleid', 'Title') }}
            {{ Form::select('titleid', $titles, null, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('issue', 'Issue') }}
            {{ Form::text('issue', null, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('printing', 'Printing') }}
            {{ Form::text('printing', '1st', array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('condition', 'Condition') }}
            {{ Form::select('condition', array('mint' => 'Mint', 'near mint' => 'Near Mint', 'very fine' => 'Very Fine', 'fine' => 'Fine', 'very good' => 'Very Good', 'good' => 'Good', 'fair' => 'Fair', 'poor' => 'Poor'), null, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('released', 'Released') }}
            {{ Form::text('released', null, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('is_special', 'Is Special?') }}
            {{ Form::checkbox('is_special', 0, null, array('class' => 'checkbox')) }}
        </div>

        <div class="form-group">
            {{ Form::label('comments', 'Comments') }}
            {{ Form::textarea('comments', null, array('class' => 'form-control', 'rows' => '2')) }}
        </div>

        {{ Form::submit('Edit the Book!', array('class' => 'btn btn-primary')) }}
        {{ HTML::linkRoute('mybooks.index', 'Cancel', array(), array('class' => 'btn btn-default')) }}

    {{ Form::close() }}
@stop
