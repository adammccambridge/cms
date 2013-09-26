<?php

class PagesTableSeeder extends Seeder {

	/**
	 * Run the database seeds
	 *
	 * @return void
	 */
	public function run()
	{
		$pages = array(
			array(
				'title'   => 'Test Title',
				'content' => 'lorem ipsum dolor sit amir',
				'slug'    => 'test-title'
			),
			array(
				'title'   => 'Test Title2',
				'content' => 'lorem ipsum dolor sit amir',
				'slug'    => 'test-title2'
			),
			array(
				'title'   => 'Test Title3',
				'content' => 'lorem ipsum dolor sit amir',
				'slug'    => 'test-title3'
			),
			array(
				'title'   => 'Test Title4',
				'content' => 'lorem ipsum dolor sit amir',
				'slug'    => 'test-title4'
			),
			array(
				'title'   => 'Test Title5',
				'content' => 'lorem ipsum dolor sit amir',
				'slug'    => 'test-title5'
			)
		);

		DB::table('pages')->insert($pages);
	}

}