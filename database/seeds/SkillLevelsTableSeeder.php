<?php

use Illuminate\Database\Seeder;

class SkillLevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('skill_levels')->insert([
            [ 'level' => 'Intern' ],
            [ 'level' => 'Junior' ],
            [ 'level' => 'Strong Junior' ],
            [ 'level' => 'Middle' ],
            [ 'level' => 'Senior' ]
        ]);
    }
}
