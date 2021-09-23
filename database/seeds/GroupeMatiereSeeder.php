<?php

use App\GroupeMatiere;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupeMatiereSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $groupe_matieres = [
            [
                "intitule" => "Enseignement Scientifique",
                "session_id" => 1
            ],

            [
                "intitule" => "Enseignement Litéraire",
                "session_id" => 1
            ]
        ];

        DB::beginTransaction();
        try {

            foreach($groupe_matieres as $groupe_matiere){
                GroupeMatiere::create($groupe_matiere);
            }
            DB::commit();
        } catch (\Exception $e) {
           DB::rollBack();
        }
    }
}
