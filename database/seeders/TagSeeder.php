<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();

        $tags = [
            ['name' => 'Tag 1', 'created_at' => $now,'updated_at' => $now],
            ['name' => 'Tag 2', 'created_at' => $now,'updated_at' => $now],
            ['name' => 'Tag 3', 'created_at' => $now,'updated_at' => $now],
            ['name' => 'Tag 4', 'created_at' => $now,'updated_at' => $now],
        ];

        DB::table('tags')->insert($tags);
    }
}
