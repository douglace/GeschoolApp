<?php

use App\User;
use App\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            "email" => "admin@geschool.com",
            "name" => "Directeur",
            "password" => Hash::make("admin"),
        ];

        $setting = [
            "annee_id" => 1,
            "nom" => "GESCHOOL APP"
        ];

        DB::beginTransaction();
        try {
            User::create($user);
            Setting::create($setting);
            DB::commit();
        } catch (\Exception $e) {
           DB::rollBack();
        }
        
    }
}
