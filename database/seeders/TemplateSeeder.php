<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use DB;
use Database\DisableForeignKeys;
use Database\TruncateTable;

class TemplateSeeder extends Seeder
{
    use TruncateTable, DisableForeignKeys;
    public function run()
    {
        $this->disableForeignKeys();
        $this->truncate('templates');

        $json1 = json_encode(['ordernumber' => '11111']);
        $json2 = json_encode(['trackid' => 'asdasdasd']);
        DB::table('templates')->insert(
            [
                ['name' => 'Digital Order Templates', 'subject' => 'Your Serial Key', 'filename' => 'digital_order', 'placehoders' => '["customer_name", "serial_key"]'],
                ['name' => 'Balance Templates', 'subject' => 'Your Balance', 'filename' => 'balance', 'placehoders' => '["account_name", "account_number", "balance"]'],
                ['name' => 'Alert Templates', 'subject' => 'Alert', 'filename' => 'alert', 'placehoders' => '["website_url"]']
            ]
        );
        $this->enableForeignKeys();
    }
}