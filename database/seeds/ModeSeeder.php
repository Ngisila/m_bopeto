<?php

use App\Mode_Paiement;
use Illuminate\Database\Seeder;

class ModeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $mode = array("Carte", "Chèque", "Espèce");
        foreach ($mode as $value) {
            $mode = new Mode_Paiement();
            $mode->lib_mod_paie = $value;
            $mode->save();
        }
    }
}
