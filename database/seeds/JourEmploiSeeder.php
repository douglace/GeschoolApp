<?php

use Illuminate\Database\Seeder;

class JourEmploiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $jours = [
            [
                "intitule" => "LUNDI",
                "session_id" => 1

            ],
            [
                "intitule" => "MARDI",
                "session_id" => 1
            ],
            [
                "intitule" => "MERCREDI",
                "session_id" => 1
            ],
            [
                "intitule" => "JEUDI",
                "session_id" => 1
            ],
            [
                "intitule" => "VENDREDI",
                "session_id" => 1
            ],
            [
                "intitule" => "SAMEDI",
                "session_id" => 1
            ],
            [
                "intitule" => "MONDAY",
                "session_id" => 2
            ],
            [
                "intitule" => "TUESDAY",
                "session_id" => 2
            ],
            [
                "intitule" => "WEDNESDAY",
                "session_id" => 2
            ],
            [
                "intitule" => "THURSDAY",
                "session_id" => 2
            ],
            [
                "intitule" => "FRIDAY",
                "session_id" => 2
            ],
            [
                "intitule" => "SATURDAY",
                "session_id" => 2
            ],
        ];

        \Illuminate\Support\Facades\DB::beginTransaction();
        try {

            foreach ($jours as $jour){
                \App\Jour::create($jour);
            }

            \Illuminate\Support\Facades\DB::commit();

        }catch (\Exception $e){
            \Illuminate\Support\Facades\DB::rollBack();
        }
    }
}
