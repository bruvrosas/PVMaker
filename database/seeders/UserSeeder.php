<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->format('Y-m-d H:i:s');

        DB::table('users')->insert([
            'name' => 'Bruno',
            'email' => 'bruno@laravel.test',
            'email_verified_at' => null,
            // hash obtained from https://bcrypt.online/
            'password' => '$2y$10$LYn1TVBlXpTSKftPx9wD..GMaIsh5t/rPMFrG/HU/RQOXCMgn0Z2G',
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}
