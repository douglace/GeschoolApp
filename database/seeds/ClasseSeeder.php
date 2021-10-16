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
                "cycle_id" => 2,
                "session_id" => 1,
                "enseignant_id" => 0,
                "Montant" => 200000
            ],

            [
                "intitule" => "3eme ESP",
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
