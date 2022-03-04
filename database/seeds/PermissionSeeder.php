<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            "dashboard_view",
            //role role
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            //user role
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            //annee role
            'academique',
            'annee_scolaire_view',
            'annee-create',
            'annee-edit',
            'annee-delete',
            'annee-etat',
            "change-annee-scolaire",
            //session role
            'session_view',
            'session-create',
            'session-edit',
            'session-delete',
            'session-etat',
            "change-session",
            //trimestre role
            'trimestre_view',
            'trimestre-create',
            'trimestre-edit',
            'trimestre-delete',
            'trimestre-etat',
            //sequence role
            'sequence_view',
            'sequence-create',
            'sequence-edit',
            'sequence-delete',
            'sequence-etat',
            //cycle role
            'cycle_view',
            'cycle-create',
            'cycle-edit',
            'cycle-delete',
            'cycle-etat',
            //classe role
            "classes",
            'classe_view',
            'classe-create',
            'classe-edit',
            'classe-delete',
            'classe-etat',
            //groupe matière role
            'groupe_matiere_view',
            'groupe-matiere-create',
            'groupe-matiere-edit',
            'groupe-matiere-delete',
            'groupe-matiere-etat',
            //matière role
            "matieres",
            'matiere_view',
            'matiere-create',
            'matiere-edit',
            'matiere-delete',
            'matiere-etat',
            //élève role
            "eleves",
            'eleves_view',
            'eleve-create',
            'eleve-edit',
            'eleve-delete',
            'eleve-profil',
            'eleve-etat',
            //enseignant role
            "enseignants",
            'enseignants_view',
            'enseignant-create',
            'enseignant-edit',
            'enseignant-delete',
            'enseignant-profil',
            'enseignant-etat',
            //cours role
            'cours_view',
            'cours-create',
            'cours-edit',
            'cours-delete',
            'cours-etat',
            //note role
            "notes",
            'note_view',
            'note-create',
            'note-edit',
            //bulletins sequence role
            "bulletins",
            'bulletins_sequence_view',
            'bulletins_trimestre_view',
            'bulletins_view',
            //emploies du temps
            "emploies",
            "emploies_view",
            "emploies-add",
            "emploies-delete",
            "emploies-edit",
            //absences
            "absences",
            "absences-add",
            "absences-edit",
            "absences_enseignant-add",
            "absences_enseignant-edit",
            "absences_sequence_view",
            "absences_trimestre_view",
            "absences_enseignant_sequence_view",
            "absences_enseignant_trimestre_view",

            "Parametres"
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }


        $role = Role::create(['name' => 'SuperAdmin']);
        $permissions = Permission::pluck('id', 'id')->all();
        $role->syncPermissions($permissions);
        $user = User::first();
        $user->assignRole([$role->id]);
    }
}
