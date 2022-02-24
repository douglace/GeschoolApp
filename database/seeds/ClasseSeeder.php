<?php

use App\Classe;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClasseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $classes = [
            [
                "intitule" => "TleD",
                "cycle_id" => 2,
                "session_id" => 1,
                "enseignant_id" => 1,
                "Montant" => 200000
            ],

            [
                "intitule" => "3eme ESP",
                "cycle_id" => 1,
                "session_id" => 1,
                "enseignant_id" => 1,
                "Montant" => 170000
            ]
        ];

        DB::beginTransaction();
        try {

            foreach($classes as $classe){
                Classe::create($classe);
            }
            DB::commit();
        } catch (\Exception $e) {
           DB::rollBack();
        }

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

        DB::beginTransaction();
        try {

            foreach ($jours as $jour){
                \App\Jour::create($jour);
            }

            DB::commit();

        }catch (\Exception $e){
            DB::rollBack();
        }
    }
}
