<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class FolderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();

        $folders = [
            ['name' => 'Folder 1','user_id' => 1, 'created_at' => $now,'updated_at' => $now],
            ['name' => 'Folder 2','user_id' => 1, 'created_at' => $now,'updated_at' => $now],
            ['name' => 'Folder 3','user_id' => 1, 'created_at' => $now,'updated_at' => $now],
        ];

        DB::table('folders')->insert($folders);
    }
}
