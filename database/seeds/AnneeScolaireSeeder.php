<?php

use App\AnneeScolaire;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnneeScolaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::beginTransaction();

        try {

            $annes = [
                [
                   "debut" => 2020,
                   "fin" => 2021
                ]
           ];
   
           foreach($annes as $anne){
               AnneeScolaire::create($anne);
           }

           DB::commit();

        } catch (\Exception $e) {
            DB::rollBack();
        }
    }
}
