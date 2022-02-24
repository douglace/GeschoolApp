<?php

use App\Matiere;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MatiereSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $matieres = [
            [
                "intitule" => "Mathématique",
                "groupe_matiere_id" => 1,
                "enseignant_id" => 1,
                "session_id" => 1
            ],

            [
                "intitule" => "Français",
                "groupe_matiere_id" => 2,
                "enseignant_id" => 1,
                "session_id" => 1
            ]
        ];

        DB::beginTransaction();
        try {

            foreach($matieres as $matiere){
                Matiere::create($matiere);
            }
            DB::commit();
        } catch (\Exception $e) {
           DB::rollBack();
        }
    }
}
