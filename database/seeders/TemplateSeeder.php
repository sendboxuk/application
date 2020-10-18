<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use DB;
class TemplateSeeder extends Seeder
{

    public function run()
    {
        $json1 = json_encode(['ordernumber' => '11111']);
        $json2 = json_encode(['trackid' => 'asdasdasd']);
        DB::table('templates')->insert(
            [
                ['name' => 'Games Templates', 'subject' => 'Your Order', 'filename' => 'games'],
                ['name' => 'Staff Templates', 'subject' => 'Your Order', 'filename' => 'staff'],
                ['name' => 'Warehouse Templates', 'subject' => 'Your Order', 'filename' => 'warehouse']
            ]
        );

    }
}