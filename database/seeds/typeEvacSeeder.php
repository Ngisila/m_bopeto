<?php

use App\Type_evacuation;
use Illuminate\Database\Seeder;

class typeEvacSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = array('Ordinaire', 'Special');
        foreach ($types as $value) {
            $types = new Type_evacuation();
            $types->libevac = $value;
            $types->save();
        }
    }
}
