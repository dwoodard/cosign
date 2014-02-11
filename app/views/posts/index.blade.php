@extends('layouts.scaffold')

@section('main')

<h1>All Posts</h1>

<p>{{ link_to_route('posts.create', 'Add new post') }}</p>

@if ($posts->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Title</th>
				<th>Type</th>
				<th>Content</th>
				<th>Title_img</th>
				<th>Source_url</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($posts as $post)
				<tr>
					<td>{{{ $post->title }}}</td>
					<td>{{{ $post->type }}}</td>
					<td>{{{ $post->content }}}</td>
					<td>{{{ $post->title_img }}}</td>
					<td>{{{ $post->source_url }}}</td>
                    <td>{{ link_to_route('posts.edit', 'Edit', array($post->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('posts.destroy', $post->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no posts
@endif

@stop
