@extends('layouts.scaffold')

@section('main')

<h1>Create Post</h1>

{{ Form::open(array('route' => 'posts.store')) }}
	<ul>
        <li>
            {{ Form::label('title', 'Title:') }}
            {{ Form::text('title') }}
        </li>

        <li>
            {{ Form::label('type', 'Type:') }}
            {{ Form::text('type') }}
        </li>

        <li>
            {{ Form::label('content', 'Content:') }}
            {{ Form::textarea('content') }}
        </li>

        <li>
            {{ Form::label('title_img', 'Title_img:') }}
            {{ Form::text('title_img') }}
        </li>

        <li>
            {{ Form::label('source_url', 'Source_url:') }}
            {{ Form::text('source_url') }}
        </li>

		<li>
			{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop


