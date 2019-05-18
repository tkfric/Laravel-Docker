<?php

use Illuminate\Database\Seeder;

class BookMarksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('bookmarks')->insert([
            [
                'user_id' => 1,
                'shop_id' => 'J000722184'
            ],
            [
                'user_id' => 1,
                'shop_id' => 'J000722185'
            ]
        ]);
    }
}
