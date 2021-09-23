<?php

use App\ParentEleve;
use App\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $parent = [

            "nom_parent" => "John Doe",
            "profession" => "Commerçant",
            "tel_parent" => "6255556222",
            "adresse_parent" => "carrière",
            "statut_parent" => "Père",
            "email_parent" => "Johndoe@gmail.com"
        ];
        
        DB::beginTransaction();
        try {

            ParentEleve::create($parent);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }
}
