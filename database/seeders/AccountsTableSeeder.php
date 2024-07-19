<?php

namespace Database\Seeders;

use App\Models\Account;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AccountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Account::create([
            'username' => 'admin',
            'password' => Hash::make('admin'),
            'name' => 'nama admin',
            'role' => 'admin',
        ]);

        Account::create([
            'username' => 'author',
            'password' => Hash::make('author'),
            'name' => 'nama author',
            'role' => 'author',
        ]);
    }
}
