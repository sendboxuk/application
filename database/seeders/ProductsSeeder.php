<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use DB;
class ProductsSeeder extends Seeder
{

    public function run()
    {
        DB::table('products')->insert(
            [
                ['name' => 'XBOX Game', 'template_id' => 1, 'sku' => 'XHA'],
                ['name' => 'MS Office 2019', 'template_id' => 1, 'sku' => 'X3A'],
                ['name' => 'MS Office 2020', 'template_id' => 1, 'sku' => 'X4A']
            ]
        );

    }
}