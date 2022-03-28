<?php

use App\Eleve;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class EleveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $eleve = [
            "matricul" => "21E001",
            "nom" => "JOHN",
            "prenom" => "Doe",
            "date" => "2021-09-20",
            "lieu" => "Yaoundé",
            "sexe" => "MASCULIN",
            "nationalite" => "Camerounais",
            "adresse" => "carrière",
            "tel" => "6532565655",
            "email" => "john@gmail.com",
            "statut" => "Non Redoublant",
            "maladie" => "-",
            "handicap" => "Apte",
            "session_id" => 1,
            "parent_id" => 1,
        ];

        $users = [
            'name' => $eleve['nom'].' '.$eleve['prenom'],
            'password' => Hash::make('0000'),
            'email' => $eleve['matricul']
        ];

        DB::beginTransaction();
        try {

            $user = User::create($users);

            $role = Role::create(['name' => 'Elève']);

            $user->assignRole([$role->id]);

            $eleve["user_id"] = $user->id;

            Eleve::create($eleve);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }
}
