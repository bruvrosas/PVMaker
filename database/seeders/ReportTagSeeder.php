<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReportTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();

        $data = [
            ['report_id' => '1', 'tag_id' => '1'],
            ['report_id' => '1', 'tag_id' => '3'],
            ['report_id' => '1', 'tag_id' => '4'],
            ['report_id' => '2', 'tag_id' => '2'],
            ['report_id' => '2', 'tag_id' => '4'],
        ];

        DB::table('report_tag')->insert($data);
    }
}
