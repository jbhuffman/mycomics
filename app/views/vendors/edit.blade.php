@extends('layout')

@section('content')
    <h1>Edit {{ $vendor->name }}</h1>

    <!-- if there are creation errors, they will show here -->
    {{ HTML::ul($errors->all()) }}

    {{ Form::model($vendor, array('route' => array('vendors.update', $vendor->id), 'method' => 'PUT')) }}

        <div class="form-group">
            {{ Form::label('name', 'Vendor') }}
            {{ Form::text('name', null, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('url', 'URL') }}
            {{ Form::text('url', null, array('class' => 'form-control')) }}
        </div>

        {{ Form::submit('Edit the Vendor', array('class' => 'btn btn-primary')) }}
        {{ HTML::linkRoute('vendors.index', 'Cancel', array(), array('class' => 'btn btn-default')) }}

    {{ Form::close() }}
@stop
