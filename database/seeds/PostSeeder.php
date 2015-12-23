<?php

use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('post')->insert([
       	[
       	'url' => 'https://www.youtube.com/watch?v=IUomHADFyzA',
       	'type' => 'youtube',
        'mediaId' => 'IUomHADFyzA',
       	'userId' => '1',
       	],

       	[
       	'url' => 'https://vimeo.com/jamesonfirstshot/143845519',
       	'type' => 'vimeo',
        'mediaId' => '143845519',
       	'userId' => '1',
       	],

       	[
       	'url' => 'https://soundcloud.com/kevingates/really-really',
       	'type' => 'soundcloud',
        'mediaId' => 'null',
       	'userId' => '1',
       	]

       	]);
    }
}
