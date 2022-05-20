<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->format('Y-m-d H:i:s');

        DB::table('reports')->insert([
            'title' => 'PV 1',
            'date' => Carbon::now()->format('Y-m-d'),
            'start_time' => Carbon::now()->format('H:i:s'),
            'end_time' => Carbon::now()->format('H:i:s'),
            'participants' => 'Bob;Alice;Marc',
            'absents' => 'Robin;Estelle',
            'excused' => 'Jean',
            'agenda' => 'Agenda example',
            'folder_id' => '1',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('reports')->insert([
            'title' => 'PV 2',
            'date' => Carbon::now()->format('Y-m-d'),
            'start_time' => Carbon::now()->format('H:i:s'),
            'end_time' => Carbon::now()->format('H:i:s'),
            'participants' => 'Bob;Alice;Marc',
            'absents' => 'Estelle',
            'excused' => 'Jean;Bruno;Michel',
            'agenda' => 'Agenda example 2',
            'folder_id' => '2',
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}
