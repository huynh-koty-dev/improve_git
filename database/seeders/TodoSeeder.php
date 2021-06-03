<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('todos')->insert([
            [
                'title' => 'em Huyền',
                'status' => 'đang hoàn thành',
                'content' => 'Tối t3 đi chơi với em Huyền ở công viên.',
                'user_id' => '5',
            ],
            [
                'title' => 'em Trang',
                'status' => 'chưa hoàn thành',
                'content' => 'Sáng t6 em Trang rủ đến nhà chơi.',
                'user_id' => '5',
            ],
            [
                'title' => 'ny anh Huynh',
                'status' => 'chưa hoàn thành',
                'content' => 'Tối t6 anh Huynh đến nhà chơi, mình háo hức quá.',
                'user_id' => '6',
            ],
        ]);
    }
}
