<?php

use App\Frequence;
use Illuminate\Database\Seeder;

class frequenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $frequences = array('Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche');
        foreach ($frequences as $value) {
            $frequences = new Frequence();
            $frequences->libelle = $value;
            $frequences->save();
        }
    }
}
