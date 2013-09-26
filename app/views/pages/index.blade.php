@extends('layouts.admin')


@section('content')
<a href="/pages/create" class="btn btn-primary">
	<i class="icon-plus"></i>
	Add New Page
</a>
	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>Page Title</th>
				<th>Created On</th>
				<th>Last Updated</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			@foreach($pages as $page)
				<tr>
					<td>{{ $page->title }}</td>
					<td>{{ date("d M Y",strtotime($page->created_at)) }}</td>
					<td>{{ date("d M Y",strtotime($page->updated_at)) }}</td>
					<td>
						<a href="pages/{{ $page->id }}/edit" class="btn btn-warning">Edit</a>
						<a href="pages/{{ $page->id }}" target="_blank" class="btn btn-info">View</a>
						<a href="#" class="btn btn-danger">Delete</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@stop