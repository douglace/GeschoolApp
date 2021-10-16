<?php

use App\Trimestre;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TrimestreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $trimestres = [
            [
                "intitule" => "Trimestre 1",
                "numero" => 1,
                "session_id" => 1
            ],

            [
                "intitule" => "Trimestre 2",
                "numero" => 2,
                "session_id" => 1
            ],
            [
                "intitule" => "Trimestre 3",
                "numero" => 3,
                "session_id" => 1
            ]
        ];

        DB::beginTransaction();
        try {

            foreach($trimestres as $trimestre){
                Trimestre::create($trimestre);
            }
            DB::commit();
        } catch (\Exception $e) {
           DB::rollBack();
        }
    }
}
