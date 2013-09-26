<?php

class PagesController extends \BaseController {

	public function __construct(PagesRepository $pages)
	{
		$this->pages = $pages;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$pages = Page::all();

		return View::make('pages.index', compact('pages'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('pages.create', array(
			'page' => new Page
		));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = Input::all();

		$tags = $data['tags'];
		unset($data['tags']);

		$page = $this->pages->create($data);

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

		if( $page instanceof Page ) {
			return Redirect::action('PagesController@show', $page->id);
		}

		return Redirect::action('PagesController@create')->withErrors($page);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

		$page = $this->pages->findById($id);

		return View::make('pages.show', compact('page'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$page = $this->pages->findById($id);

		return View::make('pages.edit', array(
			'page' => $page

		));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$data = Input::all();

		$page = $this->pages->update($id, $data);

		return Redirect::action('PagesController@show', array($page->id));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$page = Page::find($id);
		$page->delete();
	}

}