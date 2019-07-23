<?php

use Illuminate\Database\Seeder;

class AttributeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('attributes')->insert([
            'name'          =>  'logo',
            'display_order' =>  '1',
            'type'          =>  'file',
            'memo'          =>  '',
            'created_at'    =>  date('Y-m-d H:i:s'),
            'updated_at'    =>  date('Y-m-d H:i:s')
        ]);

        DB::table('attributes')->insert([
            'name'          =>  'name',
            'display_order' =>  '2',
            'type'          =>  'text',
            'memo'          =>  '',
            'created_at'    =>  date('Y-m-d H:i:s'),
            'updated_at'    =>  date('Y-m-d H:i:s')
        ]);

        DB::table('attributes')->insert([
            'name'          =>  'price',
            'display_order' =>  '3',
            'type'          =>  'number',
            'memo'          =>  '',
            'created_at'    =>  date('Y-m-d H:i:s'),
            'updated_at'    =>  date('Y-m-d H:i:s')
        ]);

        DB::table('attributes')->insert([
            'name'          =>  'memo',
            'display_order' =>  '4',
            'type'          =>  'text',
            'memo'          =>  '',
            'created_at'    =>  date('Y-m-d H:i:s'),
            'updated_at'    =>  date('Y-m-d H:i:s')
        ]);
    }
}
