<?php

class Tag extends Eloquent {

	protected $fillable = array('name');

	public function pages() {

		return $this->belongsToMany('Page')->withTimestamps();

	}



}

