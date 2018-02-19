<?php

use Illuminate\Database\Seeder;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            'id'          => 1,
            'name'        => 'rock',
            'description' => '',
        ]);
        
        DB::table('tags')->insert([
            'id'          => 2,
            'name'        => 'pop',
            'description' => '',
        ]);
    }
}
