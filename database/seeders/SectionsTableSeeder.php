<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SectionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sections')->delete();
        
        \DB::table('sections')->insert(array (
            0 => 
            array (
                'id' => 3223,
                'store_id' => 3,
                'description' => 'Merchandise',
                'order' => 3,
                'parent' => 2,
                'ppr_override' => 0,
            ),
            1 => 
            array (
                'id' => 3243,
                'store_id' => 3,
                'description' => 'Tickets',
                'order' => 0,
                'parent' => 3,
                'ppr_override' => 0,
            ),
            2 => 
            array (
                'id' => 3253,
                'store_id' => 3,
                'description' => 'Downloads',
                'order' => 1,
                'parent' => 5,
                'ppr_override' => 0,
            ),
            3 => 
            array (
                'id' => 7416,
                'store_id' => 3,
                'description' => 'Bundles',
                'order' => 0,
                'parent' => 4,
                'ppr_override' => 0,
            ),
            4 => 
            array (
                'id' => 7796,
                'store_id' => 3,
                'description' => 'Vinyl',
                'order' => 2,
                'parent' => 5,
                'ppr_override' => 0,
            ),
            5 => 
            array (
                'id' => 8408,
                'store_id' => 3,
                'description' => 'T-Shirts',
                'order' => 0,
                'parent' => 2,
                'ppr_override' => 0,
            ),
            6 => 
            array (
                'id' => 8412,
                'store_id' => 3,
                'description' => 'Accessories',
                'order' => 2,
                'parent' => 2,
                'ppr_override' => 0,
            ),
            7 => 
            array (
                'id' => 8414,
                'store_id' => 3,
                'description' => 'Hoodies',
                'order' => 1,
                'parent' => 2,
                'ppr_override' => 0,
            ),
        ));
        
        
    }
}