<?php

use App\Paiement;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaiementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $paiement = [
            "montant" => 200000,
            "reste" => 200000,
            "eleve_id" => 1,
            "annee_id" => 2
        ];

        DB::beginTransaction();
        try {
            Paiement::create($paiement);
            DB::commit();
        } catch (\Exception $e) {
           DB::rollBack();
        }
    }
}
