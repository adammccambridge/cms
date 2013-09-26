@if( !empty($errors) )
	<?php
		foreach( $errors->all() as $message ) {
			var_dump($message);
		}
	?>
@endif
<form method="POST" action="{{ $page->exists ? action('PagesController@update', $page->id) : action('PagesController@store') }}">
	@if( $page->exists )
		<input type="hidden" name="_method" value="PUT" />
	@endif

  <div class="form-group">
    <label for="title">Page Title</label>
    <input type="text" class="form-control" name="title" placeholder="Enter Page Title" value="{{ $page->title }}">
  </div>

  <div class="form-group">
    <label for="meta_title">Page Meta Title</label>
    <input class="form-control" type="text" name="meta_title" value="{{ $page->meta_title }}" />
  </div>

  <div class="form-group">
    <label for="meta_keywords">Page Meta Keywords</label>
    <input class="form-control" type="text" name="meta_keywords" value="{{ $page->meta_keywords }}" />
  </div>

  <div class="form-group">
    <label for="meta_description">Page Meta Description</label>
    <textarea class="form-control"name="meta_description" rows="5" cols="45">{{ $page->meta_description }}</textarea>
  </div>

  <div class="form-group">
    <label for="tags">Tags</label>
    <input class="form-control" type="text" name="tags" value="{{ implode( ',', array_pluck($page->tags->toArray(), 'name') ) }}" />
  </div>

  <div class="form-group">
  	<label for="content">Page Content</label>
    <textarea class="form-control" name="content" id="redactor" class="form-control" rows="25">{{ $page->content }}</textarea>
  </div>

  <div class="form-group">
    <button type="submit" class="btn btn-default">Submit</button>
  </div>

</form>


@section('scripts')
<script src="{{ asset('js/redactor.min.js') }}"></script>
<link href="{{ asset('css/redactor.css') }}" rel="stylesheet" />
<!-- <link href="{{ asset('css/redactor-iframe.css') }}" rel="stylesheet" /> -->
<script>
	$(function(){
		$('#redactor').redactor({
			iframe: true,
			convertDivs: false,
			css: '{{ asset("css/site.css") }}'
		});
	});
</script>
@stop