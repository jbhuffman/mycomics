@extends('layout')

@section('content')
    <h1>Edit {{ $title->title }}</h1>

    <!-- if there are creation errors, they will show here -->
    {{ HTML::ul($errors->all()) }}

    {{ Form::model($title, array('route' => array('titles.update', $title->id), 'method' => 'PUT')) }}
        <input type="hidden" name="token" value="{{ $token }}">

        <div class="form-group">
            {{ Form::label('title', 'Title') }}
            {{ Form::text('title', null, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('publisher_id', 'Publisher') }}
            {{ Form::select('publisher_id', [null=>'Please Select'] + $publishers, null, array('class' => 'form-control required')) }}
        </div>

        <div class="form-group">
            {{ Form::label('time_frame', 'Timeframe') }}
            {{ Form::text('time_frame', null, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('series_type', 'Series Type') }}
            {{ Form::select('series_type', array('limited' => 'Limited', 'maxi' => 'Maxi', 'one-shot' => 'One Shot', 'normal' => 'Normal'), null, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('main_issues', 'Main Issues') }}
            {{ Form::text('main_issues', null, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('annuals', 'Annuals') }}
            {{ Form::text('annuals', null, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('specials', 'Specials') }}
            {{ Form::text('specials', null, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('missing_issues', 'Missing Issues') }}
            {{ Form::text('missing_issues', null, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('comments', 'Comments') }}
            {{ Form::textarea('comments', null, array('class' => 'form-control', 'rows' => '2')) }}
        </div>

        {{ Form::submit('Edit the Title!', array('class' => 'btn btn-primary')) }}
        {{ HTML::linkRoute('titles.index', 'Cancel', array(), array('class' => 'btn btn-default')) }}

    {{ Form::close() }}
@stop
