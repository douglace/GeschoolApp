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
        $this->call(AnneeScolaireSeeder::class);
        $this->call(SessionSeeder::class);
        $this->call(TrimestreSeeder::class);
        $this->call(SequenceSeeder::class);
        $this->call(FiliereSeeder::class);
        $this->call(ClasseSeeder::class);
        $this->call(GroupeMatiereSeeder::class);
        $this->call(MatiereSeeder::class);
    }
}
