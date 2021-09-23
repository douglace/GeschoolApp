<?php

use App\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SequenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sequences = [
            [
                "intitule" => "Séquence 1",
                "numero" => 1,
                "trimestre_id" => 1,
                "session_id" => 1
            ],

            [
                "intitule" => "Séquence 2",
                "numero" => 2,
                "trimestre_id" => 1,
                "session_id" => 1
            ]
        ];

        DB::beginTransaction();
        try {

            foreach($sequences as $sequence){
                Sequence::create($sequence);
            }
            DB::commit();
        } catch (\Exception $e) {
           DB::rollBack();
        }
    }
}
