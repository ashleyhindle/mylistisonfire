<?php

use Illuminate\Database\Seeder;

class KeyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('keys')->insert([
            'key' => 'cheeseburger',
            'created_at' => (new DateTime('now', new DateTimeZone('UTC')))->format('Y-m-d H:i:s'),
            'updated_at' => (new DateTime('now', new DateTimeZone('UTC')))->format('Y-m-d H:i:s'),
        ]);

        DB::table('keys')->insert([
            'key' => 'boris',
            'created_at' => (new DateTime('now', new DateTimeZone('UTC')))->format('Y-m-d H:i:s'),
            'updated_at' => (new DateTime('now', new DateTimeZone('UTC')))->format('Y-m-d H:i:s'),
        ]);
    }
}