<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use DB;
use Database\DisableForeignKeys;
use Database\TruncateTable;

class MailDriverSeeder extends Seeder
{
    use TruncateTable, DisableForeignKeys;

    public function run()
    {
        $this->disableForeignKeys();
        $this->truncate('mail_drivers');

        DB::table('mail_drivers')->insert(
            [
                ['name' => 'Mailgun'],
                ['name' => 'Postmark'],
                ['name' => 'Amazon SES'],
                ['name' => 'SendGrid']
            ]
        );
        $this->enableForeignKeys();
    }
}