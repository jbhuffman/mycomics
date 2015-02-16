@extends('layout')

@section('content')
    <h1>Add a Title</h1>

    <!-- if there are creation errors, they will show here -->
    {{ HTML::ul($errors->all()) }}

    {{ Form::open(array('url' => 'titles', 'method' => 'POST')) }}
        {{ Form::token() }}

        <div class="form-group">
            {{ Form::label('title', 'Title') }}
            {{ Form::text('title', Input::old('title'), array('class' => 'form-control required')) }}
        </div>

        <div class="form-group">
            {{ Form::label('publisher_id', 'Publisher') }}
            {{ Form::select('publisher_id', [null=>'Please Select'] + $publishers, Input::old('publisher_id', null), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('time_frame', 'Timeframe') }}
            {{ Form::text('time_frame', Input::old('time_frame'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('series_type', 'Series Type') }}
            {{ Form::select('series_type', array('limited' => 'Limited', 'maxi' => 'Maxi', 'one-shot' => 'One Shot', 'normal' => 'Normal'), Input::old('series_type') ?: 'normal', array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('main_issues', 'Main Issues') }}
            {{ Form::text('main_issues', Input::old('main_issues'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('annuals', 'Annuals') }}
            {{ Form::text('annuals', Input::old('annuals'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('specials', 'Specials') }}
            {{ Form::text('specials', Input::old('specials'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('missing_issues', 'Missing Issues') }}
            {{ Form::text('missing_issues', Input::old('missing_issues'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('comments', 'Comments') }}
            {{ Form::textarea('comments', Input::old('comments'), array('class' => 'form-control', 'rows' => '2')) }}
        </div>

        {{ Form::submit('Add the Title!', array('class' => 'btn btn-primary')) }}
        {{ HTML::linkRoute('titles.index', 'Cancel', array(), array('class' => 'btn btn-default')) }}

    {{ Form::close() }}
@stop
