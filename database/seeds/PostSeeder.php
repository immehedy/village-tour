<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('posts')->insert([
        ['user_id'=>1,'title'=>"post one",'content'=>"This is post one content"],
        ['user_id'=>1,'title'=>"post two",'content'=>"This is post two content"],
        ['user_id'=>1,'title'=>"post three",'content'=>"This is post three content"],
      ]);
    }
}
