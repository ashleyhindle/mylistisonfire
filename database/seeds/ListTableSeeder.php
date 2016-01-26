<?php

use Illuminate\Database\Seeder;

class ListTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lists')->insert([
            'key_id' => 1,
            'name' => 'Hindle Shopping List',
            'created_at' => (new DateTime('now', new DateTimeZone('UTC')))->format('Y-m-d H:i:s'),
            'updated_at' => (new DateTime('now', new DateTimeZone('UTC')))->format('Y-m-d H:i:s'),
        ]);
    }
}