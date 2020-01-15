<?php

use Illuminate\Database\Seeder;

class LevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('levels')->insert([
            [ 'level' => 'beginner' ],
            [ 'level' => 'conversational' ],
            [ 'level' => 'fluent' ],
            [ 'level' => 'native' ]
        ]);
    }
}
