<?php

use App\Cours;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoursSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cours = [
            "matiere_id" => 1,
            "classe_id" => 1,
            "enseignant_id" => 1,
            "session_id" => 1,
            "annee_id" => 2
        ];

        DB::beginTransaction();
        try {
            Cours::create($cours);
            DB::commit();
        } catch (\Exception $e) {
           DB::rollBack();
        }
    }
}
