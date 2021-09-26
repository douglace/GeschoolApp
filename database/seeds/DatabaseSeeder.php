<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(MenuSeeder::class);
        $this->call(MenuItemSeeder::class);
        $this->call(AnneeScolaireSeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(SessionSeeder::class);
        $this->call(TrimestreSeeder::class);
        $this->call(SequenceSeeder::class);
        $this->call(FiliereSeeder::class);
        $this->call(ClasseSeeder::class);
        $this->call(GroupeMatiereSeeder::class);
        $this->call(MatiereSeeder::class);
        //$this->call(ParentSeeder::class);
        //$this->call(PaiementSeeder::class);
        //$this->call(TrancheSeeder::class);
        //$this->call(EleveSeeder::class);
        //$this->call(InscriptionSeeder::class);
        $this->call(EnseignantSeeder::class);
        $this->call(CoursSeeder::class);
    }
}
