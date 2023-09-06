<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StoreProductsSectionTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('store_products_section')->delete();
        
        \DB::table('store_products_section')->insert(array (
            0 => 
            array (
                'id' => 51855,
                'store_product_id' => 24622,
                'section_id' => 8408,
                'position' => 0,
            ),
            1 => 
            array (
                'id' => 51857,
                'store_product_id' => 24621,
                'section_id' => 8408,
                'position' => 0,
            ),
            2 => 
            array (
                'id' => 51858,
                'store_product_id' => 24620,
                'section_id' => 8408,
                'position' => 0,
            ),
            3 => 
            array (
                'id' => 51861,
                'store_product_id' => 24617,
                'section_id' => 8408,
                'position' => 0,
            ),
            4 => 
            array (
                'id' => 51886,
                'store_product_id' => 24634,
                'section_id' => 8414,
                'position' => 0,
            ),
            5 => 
            array (
                'id' => 51888,
                'store_product_id' => 24635,
                'section_id' => 8414,
                'position' => 0,
            ),
            6 => 
            array (
                'id' => 51889,
                'store_product_id' => 24636,
                'section_id' => 8414,
                'position' => 0,
            ),
            7 => 
            array (
                'id' => 51890,
                'store_product_id' => 24637,
                'section_id' => 8414,
                'position' => 0,
            ),
            8 => 
            array (
                'id' => 51898,
                'store_product_id' => 24638,
                'section_id' => 8412,
                'position' => 0,
            ),
            9 => 
            array (
                'id' => 51899,
                'store_product_id' => 16586,
                'section_id' => 8412,
                'position' => 0,
            ),
            10 => 
            array (
                'id' => 51900,
                'store_product_id' => 24639,
                'section_id' => 8412,
                'position' => 0,
            ),
            11 => 
            array (
                'id' => 51902,
                'store_product_id' => 24641,
                'section_id' => 3243,
                'position' => 0,
            ),
            12 => 
            array (
                'id' => 51903,
                'store_product_id' => 24642,
                'section_id' => 7416,
                'position' => 0,
            ),
            13 => 
            array (
                'id' => 51904,
                'store_product_id' => 24643,
                'section_id' => 7416,
                'position' => 0,
            ),
            14 => 
            array (
                'id' => 51905,
                'store_product_id' => 24644,
                'section_id' => 7416,
                'position' => 0,
            ),
            15 => 
            array (
                'id' => 57093,
                'store_product_id' => 28136,
                'section_id' => 7416,
                'position' => 0,
            ),
            16 => 
            array (
                'id' => 57097,
                'store_product_id' => 28135,
                'section_id' => 7416,
                'position' => 0,
            ),
            17 => 
            array (
                'id' => 57099,
                'store_product_id' => 28135,
                'section_id' => 3223,
                'position' => 0,
            ),
            18 => 
            array (
                'id' => 57144,
                'store_product_id' => 28132,
                'section_id' => 3253,
                'position' => 0,
            ),
            19 => 
            array (
                'id' => 57145,
                'store_product_id' => 28131,
                'section_id' => 7796,
                'position' => 0,
            ),
        ));
        
        
    }
}