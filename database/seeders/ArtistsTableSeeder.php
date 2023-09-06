<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArtistsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('artists')->delete();
        
        \DB::table('artists')->insert(array (
            0 => 
            array (
                'id' => 386795,
                'name' => 'The Tests',
            ),
        ));
        
        
    }
}