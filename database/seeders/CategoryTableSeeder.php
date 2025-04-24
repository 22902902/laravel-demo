<?php

namespace Database\Seeders;

//use Category;
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
                'children' => [
                    [
                        'cate_name' => '手机',
                        'cate_title' => '手机',
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
                    ],
                ],
            ],
            [
                'cate_name' => '服装',
                'cate_title' => '服装',
            ],
        ];

        foreach ($categories as $category) {
            Cate::create($category);
        }
    }
}
