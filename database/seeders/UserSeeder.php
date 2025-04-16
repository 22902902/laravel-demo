<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 调用数据工厂
        \App\Models\User::factory(10)->create();
        // 强制设置第一个为admin
        \App\Models\User::find(1)->update([
            'username' =>'admin',
			'name' => '超级管理员'
        ]);
    }
}
