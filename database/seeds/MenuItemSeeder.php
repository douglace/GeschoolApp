<?php

use App\MenuItem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menuItems = [
            [
                "name" => "Année Scolaires",
                "slug" => "annee_scolaire_view",
                "menu_id" => 2
            ],
            [
                "name" => "Sessions",
                "slug" => "session_view",
                "menu_id" => 2
            ],
            [
                "name" => "Trimestres",
                "slug" => "trimestre_view",
                "menu_id" => 2
            ],
            [
                "name" => "Séquences",
                "slug" => "sequence_view",
                "menu_id" => 2
            ],
            [
                "name" => "Cycles",
                "slug" => "cycle_view",
                "menu_id" => 3
            ],
            [
                "name" => "Classes",
                "slug" => "classe_view",
                "menu_id" => 3
            ],
            [
                "name" => "Groupes Matières",
                "slug" => "groupe_matiere_view",
                "menu_id" => 4
            ],
            [
                "name" => "Matières",
                "slug" => "matiere_view",
                "menu_id" => 4
            ],
            [
                "name" => "Cours",
                "slug" => "cours_view",
                "menu_id" => 4
            ],
            [
                "name" => "Liste Des Elèves",
                "slug" => "eleves_view",
                "menu_id" => 5
            ],
            [
                "name" => "Liste Des Enseignants",
                "slug" => "enseignants_view",
                "menu_id" => 6
            ],
            [
                "name" => "Liste Des Emplois Du Temps",
                "slug" => "emploies_view",
                "menu_id" => 7
            ],
            [
                "name" => "Absences Séquentielle",
                "slug" => "absences_sequence_view",
                "menu_id" => 8
            ],
            [
                "name" => "Absences Trimestrielle",
                "slug" => "absences_trimestre_view",
                "menu_id" => 8
            ],
            [
                "name" => "Absences Enseignant Séquentielle",
                "slug" => "absences_enseignant_sequence_view",
                "menu_id" => 8
            ],
            [
                "name" => "Absences Enseignant Trimestrielle",
                "slug" => "absences_enseignant_trimestre_view",
                "menu_id" => 8
            ],
            [
                "name" => "Notes",
                "slug" => "note_view",
                "menu_id" => 9
            ],
            [
                "name" => "Bulletins Séquentiel",
                "slug" => "bulletins_sequence_view",
                "menu_id" => 10
            ],
            [
                "name" => "Bulletins Trimestriel",
                "slug" => "bulletins_trimestre_view",
                "menu_id" => 10
            ],
            [
                "name" => "Bulletins Fin D'Année",
                "slug" => "bulletins_fin_view",
                "menu_id" => 10
            ],
        ];

        DB::beginTransaction();
        try {

            foreach($menuItems as $menuItem){
                MenuItem::create($menuItem);
            }
            DB::commit();
        } catch (\Exception $e) {
           DB::rollBack();
        }
    }
}
