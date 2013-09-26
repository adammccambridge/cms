@extends('layouts.admin')


@section('content')
	<div class="container">
		<h1>{{ $page->title }}</h1>

		@foreach($page->tags as $tag)
			{{ $tag->name }}
		@endforeach

		{{ $page->content }}
	</div>
@stop