@extends('layouts.scaffold')

@section('main')

<h1>Edit Post</h1>
{{ Form::model($post, array('method' => 'PATCH', 'route' => array('posts.update', $post->id))) }}
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
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('posts.show', 'Cancel', $post->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
