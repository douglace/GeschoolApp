<?php

use App\Menu;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = [
            [
                "name" => "Tableau De Bord",
                "slug" => "dashboard_view",
                "icon" => "home"
            ],
            [
                "name" => "Academique",
                "slug" => "academique",
                "icon" => "archive"
            ],
            [
                "name" => "Classes",
                "slug" => "classes",
                "icon" => "domain"
            ],
            [
                "name" => "Matières",
                "slug" => "matieres",
                "icon" => "book"
            ],
            [
                "name" => "Elèves",
                "slug" => "eleves",
                "icon" => "person"
            ],
            [
                "name" => "Eseignants",
                "slug" => "enseignants",
                "icon" => "person_outline"
            ],
            [
                "name" => "Emploies",
                "slug" => "emploies",
                "icon" => "explicit"
            ],
            [
                "name" => "Absences",
                "slug" => "absences",
                "icon" => "assignment_turned_in"
            ],
            [
                "name" => "Notes",
                "slug" => "notes",
                "icon" => "content_paste"
            ],
            [
                "name" => "Bulletins",
                "slug" => "bulletins",
                "icon" => "school"
            ]
        ];

        DB::beginTransaction();
        try {

            foreach($menus as $menu){
                Menu::create($menu);
            }
            DB::commit();
        } catch (\Exception $e) {
           DB::rollBack();
        }
    }
}
