<?php

class Page extends Eloquent {

	protected $fillable = array('title','content','slug','meta_title','meta_keywords','meta_description');

	public static $rules = array(
		'title' => 'required',
		'slug'  => 'required|unique:pages'
	);

	public static function validate($data) {

		$validator = Validator::make($data, self::$rules);

		if( !$validator->fails() ){
			return true;
		}

		return $validator;
	}

	public function tags() {

		return $this->belongsToMany('Tag')->withTimestamps();

	}

}