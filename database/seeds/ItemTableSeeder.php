<?php

use Illuminate\Database\Seeder;

class ItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            'list_id' => 1,
            'name' => 'Cheese burgers',
            'position' => 13,
            'custom' => json_encode([
               'notes' => 'Yum',
                'aisle' => 8
            ]),
            'created_at' => (new DateTime('now', new DateTimeZone('UTC')))->format('Y-m-d H:i:s'),
            'updated_at' => (new DateTime('now', new DateTimeZone('UTC')))->format('Y-m-d H:i:s'),
        ]);
    }
}