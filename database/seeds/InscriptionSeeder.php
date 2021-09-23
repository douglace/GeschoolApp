<?php

use App\Inscription;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $inscription = [
            "eleve_id" => 1,
            "annee_id" => 1,
            "classe_id" => 1,
        ];
        
        DB::beginTransaction();
        try {

            Inscription::create($inscription);
            
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }
}
