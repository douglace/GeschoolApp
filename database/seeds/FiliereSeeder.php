<?php

use App\Filiere;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FiliereSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $filieres = [
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

            foreach($filieres as $filiere){
                Filiere::create($filiere);
            }
            DB::commit();
        } catch (\Exception $e) {
           DB::rollBack();
        }
    }
}
