<?php

use App\Tranche;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TrancheSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tranche = [
            "montant" => 200000,
            "reste" => 200000,
            "eleve_id" => 1,
        ];

        DB::beginTransaction();
        try {
            Tranche::create($tranche);
            DB::commit();
        } catch (\Exception $e) {
           DB::rollBack();
        }
    }
}
