<?php

use App\Enseignant;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

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

        $users = [
            'name' => $enseignant['nom'].' '.$enseignant['prenom'],
            'password' => Hash::make('0000'),
            'email' => $enseignant['matricul']
        ];

        DB::beginTransaction();
        try {

            $user = User::create($users);

            $role = Role::create(['name' => 'Enseignant']);

            $user->assignRole([$role->id]);

            $enseignant["user_id"] = $user->id;
            
            Enseignant::create($enseignant);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }
}
