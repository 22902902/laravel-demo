<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cate;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'cate_name' => '电子产品',
                'cate_title' => '电子产品',
                'slug' => \Str::slug('电子产品'),// 明确指定
                'children' => [
                    [
                        'cate_name' => '手机',
                        'cate_title' => '手机',
                        'slug' => \Str::slug('手机'),// 明确指定
                        'children' => [
                            [
                                'cate_name' => '智能手机',
                                'cate_title' => '智能手机',
                            ],
                            [
                                'cate_name' => '功能手机',
                                'cate_title' => '功能手机',
                            ],
                        ],
                    ],
                    [
                        'cate_name' => '笔记本电脑',
                        'cate_title' => '笔记本电脑',
                        'slug' => \Str::slug('笔记本电脑'),// 明确指定
                    ],
                ],
            ],
            [
                'cate_name' => '服装',
                'cate_title' => '服装',
                'slug' => \Str::slug('服装'),// 明确指定
            ],
        ];

        foreach ($categories as $category) {
            Cate::create($category);
        }
    }
}
