<?php

use App\Cycle;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CycleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cycles = [
            [
                "intitule" => "Série Scientifique",
                "session_id" => 1
            ],

            [
                "intitule" => "Série Litteraire",
                "session_id" => 1
            ]
        ];

        DB::beginTransaction();
        try {

            foreach($cycles as $cycle){
                Cycle::create($cycle);
            }
            DB::commit();
        } catch (\Exception $e) {
           DB::rollBack();
        }
    }
}
