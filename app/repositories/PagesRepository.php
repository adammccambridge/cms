<?php

class PagesRepository {

	public function findBySlug($slug) {
		$page = Page::where('slug', $slug)->first();

		if(!$page) {
			App::abort(404);
		}

		return $page;

	}

	public function findById($id) {

		$page = Page::find($id);

		if(!$page) {
			App::abort(404);
		}

		return $page;

	}


	public function create($data) {
		if( !isset($data['slug']) ) {
			$data['slug'] = Str::slug($data['title']);
		}

		$validated = Page::validate($data);

		if( $validated === true ) {
			$page = Page::create($data);

			return $page;
		}

		return $validated;

	}

	public function update($id, $data) {

		$page = $this->findById($id);

		$tags = $data['tags'];
		unset($data['tags']);

		if( !is_array($tags) ) {
			$tags = explode(',', $tags);
		}

		$tagArray = array();

		foreach($tags as $tag) {
			$t = Tag::where('name', $tag)->first();

			if( !$t ) {
				$t = Tag::create( array('name' => $tag) );
			}

			$tagArray[] = $t->id;
		}

		if( !empty( $tagArray ) ) {
			$page->tags()->sync( $tagArray );
		}

		$page->fill($data);
		$page->save();

		return $page;
	}

	public function validate($data) {

		$validated = Page::validate($data);

		if( $validated === true ) {
			$page = Page::create($data);

			return $page;
		}

		return $validated;

	}

}