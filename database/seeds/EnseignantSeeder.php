<?php

use App\Enseignant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EnseignantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $enseignant = [
            "matricul" => "21EN001",
            "nom" => "JOHN",
            "prenom" => "Doe",
            "date" => "2021-09-20",
            "lieu" => "Yaoundé",
            "sexe" => "MASCULIN",
            "nationalite" => "Camerounais",
            "adresse" => "carrière",
            "tel" => "6532565655",
            "email" => "john@gmail.com",
            "diplome" => "LICENCE",
            "session_id" => 1,
        ];
        
        DB::beginTransaction();
        try {

            Enseignant::create($enseignant);
            
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }
}
