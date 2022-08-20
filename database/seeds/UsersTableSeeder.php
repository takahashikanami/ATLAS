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
                'role'   =>'1',
                'birth_day'   =>'19971125',
                'password'   => bcrypt('password'),
            ],
            [
                'over_name'    => '高橋',
                'under_name'   => '航平',
                'over_name_kana'   => 'タカハシ',
                'under_name_kana'   => 'コウヘイ',
                'mail_address'   => 'kohei@gmail.com',
                'sex'   =>'1',
                'role'   =>'2',
                'birth_day'   =>'19930617',
                'password'   => bcrypt('password'),
            ],
            [
                'over_name'    => '山崎',
                'under_name'   => '浩司',
                'over_name_kana'   => 'ヤマザキ',
                'under_name_kana'   => 'コウジ',
                'mail_address'   => 'koji@gmail.com',
                'sex'   =>'1',
                'role'   =>'3',
                'birth_day'   =>'19970130',
                'password'   => bcrypt('password'),
            ],
            [
                'over_name'    => '町田',
                'under_name'   => '聖',
                'over_name_kana'   => 'マチダ',
                'under_name_kana'   => 'キヨシ',
                'mail_address'   => 'kiyoshi@gmail.com',
                'sex'   =>'1',
                'role'   =>'4',
                'birth_day'   =>'19961225',
                'password'   => bcrypt('password'),
            ],
            [
                'over_name'    => '丸茂',
                'under_name'   => '傭兵',
                'over_name_kana'   => 'マルモ',
                'under_name_kana'   => 'ヨウヘイ',
                'mail_address'   => 'marumo@gmail.com',
                'sex'   =>'1',
                'role'   =>'4',
                'birth_day'   =>'19961225',
                'password'   => bcrypt('password'),
            ]

          ]);
    }
}
