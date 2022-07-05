<?php

use Illuminate\Database\Seeder;
use App\Models\Users\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'over_name'    => '高橋',
                'under_name'   => '叶実',
                'over_name_kana'   => 'タカハシ',
                'under_name_kana'   => 'カナミ',
                'mail_address'   => 'knm@gmail.com',
                'sex'   =>'2',
                'role'   =>'4',
                'birth_day'   =>'19971125',
                'password'   => bcrypt('password'),
            ]

          ]);
    }
}
