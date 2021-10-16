<?php

use App\Eleve;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EleveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $eleve = [
            "matricul" => "21E0001",
            "nom" => "JOHN",
            "prenom" => "Doe",
            "date" => "2021-09-20",
            "lieu" => "Yaoundé",
            "sexe" => "MASCULIN",
            "nationalite" => "Camerounais",
            "adresse" => "carrière",
            "tel" => "6532565655",
            "email" => "john@gmail.com",
            "statut" => "Non Redoublant",
            "maladie" => "-",
            "handicap" => "Apte",
            "session_id" => 1,
            "parent_id" => 1,
        ];
        
        DB::beginTransaction();
        try {

            Eleve::create($eleve);
            
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }
}
