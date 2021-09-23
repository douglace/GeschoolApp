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
                "name" => "Gestion Academique",
                "slug" => "none9",
                "icon" => "archive"
            ],
            [
                "name" => "Gestion Des Classes",
                "slug" => "none8",
                "icon" => "domain"
            ],
            [
                "name" => "Gestion Des Matières",
                "slug" => "none7",
                "icon" => "book"
            ],
            [
                "name" => "Gestion Des Elèves",
                "slug" => "none6",
                "icon" => "person"
            ],
            [
                "name" => "Gestion Des Eseignants",
                "slug" => "none5",
                "icon" => "person_outline"
            ],
            [
                "name" => "Gestion Des Emploies",
                "slug" => "none4",
                "icon" => "explicit"
            ],
            [
                "name" => "Gestion Des Absences",
                "slug" => "none3",
                "icon" => "assignment_turned_in"
            ],
            [
                "name" => "Gestion Des Notes",
                "slug" => "none2",
                "icon" => "content_paste"
            ],
            [
                "name" => "Gestion Des Bulletins",
                "slug" => "none1",
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
