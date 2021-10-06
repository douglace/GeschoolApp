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
                "intitule" => "TleC",
                "niveau" => 7,
                "cycle_id" => 1,
                "session_id" => 1,
                "enseignant_id" => 0,
                "Montant" => 200000
            ],

            [
                "intitule" => "PA",
                "niveau" => 6,
                "cycle_id" => 1,
                "session_id" => 1,
                "enseignant_id" => 0,
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
    }
}
