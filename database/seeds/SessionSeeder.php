<?php

use App\Session;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sessions = [
            [
                "intitule" => "Francophone",
                "etat" => 1
            ],

            [
                "intitule" => "Anglephone"
            ]
        ];

        DB::beginTransaction();
        try {

            foreach($sessions as $session){
                Session::create($session);
            }
            DB::commit();
        } catch (\Exception $e) {
           DB::rollBack();
        }
    }
}
