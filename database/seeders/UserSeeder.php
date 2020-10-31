<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use DB;
use Database\DisableForeignKeys;
use Database\TruncateTable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    use TruncateTable, DisableForeignKeys;
    public function run()
    {
        $this->disableForeignKeys();
        $this->truncate('users');

        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'hi@sendbox.uk',
            'password' => Hash::make('password'),
            'email_verified_at' => Carbon::now()
        ]);
        $this->enableForeignKeys();
    }
}