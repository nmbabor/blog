<?php

use Illuminate\Database\Seeder;

class CategoryTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

	        DB::table('categories')->insert([
	            'category_name' => 'Demo Category',
	            'link' => 'demo-category',
	            'description' => 'Demo Category',
	            'keywords' => 'Demo, Category',
	            'serial_num' => 1,
                'created_by' => 1,
	            
	        ]);
    }
}
