<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Kiểm tra xem admin đã tồn tại chưa
        if (DB::table('users')->where('email', 'admin@fpt.com')->doesntExist()) {
            DB::table('users')->insert([
                'name' => 'Admin FPT',
                'email' => 'admin@fpt.com',
                'password' => Hash::make('Nl110024'), // Mật khẩu
                'role' => 1, // 1 = Admin
            ]);
        } else {
            // Cập nhật mật khẩu nếu người dùng đã tồn tại
            DB::table('users')
                ->where('email', 'admin@fpt.com')
                ->update([
                    'password' => Hash::make('Nl110024')
                ]);
        }
    }
}
