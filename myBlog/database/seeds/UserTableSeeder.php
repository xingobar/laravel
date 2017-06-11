<?php

use Illuminate\Database\Seeder;
use App\user;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 產生一筆測試 user 帳號
        User::create([
            'name'=>'admin',
            'email'=>'gary@test.com',
            'password'=>'gary'
        ]);
    }
}
