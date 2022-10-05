<?php

namespace Database\Seeders;

use App\Models\Season;
use Illuminate\Database\Seeder;

class SeasonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seasons = [
            [
                'id'         => '2',
                'title'      => '2014./2015.',
                'current'    => '0',
                'created_at' => '2014-10-01 21:45:22',
                'updated_at' => '2014-10-01 21:45:41',
            ],
            [
                'id'         => '3',
                'title'      => '2015./2016.',
                'current'    => '0',
                'created_at' => '2015-07-09 08:26:18',
                'updated_at' => '2015-10-02 12:51:14',
            ],
            [
                'id'         => '4',
                'title'      => '2016./2017.',
                'current'    => '0',
                'created_at' => '2016-11-24 15:28:55',
                'updated_at' => '2017-09-30 12:27:07',
            ],
            [
                'id'         => '5',
                'title'      => '2017./2018.',
                'current'    => '0',
                'created_at' => '2017-09-30 12:22:37',
                'updated_at' => '2018-10-16 14:50:21',
            ],
            [
                'id'         => '6',
                'title'      => '2018./2019.',
                'current'    => '0',
                'created_at' => '2018-10-16 14:50:16',
                'updated_at' => '2018-10-16 14:50:25',
            ],
            [
                'id'         => '7',
                'title'      => '2019./2020',
                'current'    => '0',
                'created_at' => '2020-02-11 09:12:45',
                'updated_at' => '2020-10-05 22:25:46',
            ],
            [
                'id'         => '8',
                'title'      => '2020./2021.',
                'current'    => '0',
                'created_at' => '2020-10-05 22:25:41',
                'updated_at' => '2021-10-04 22:42:37',
            ],
            [
                'id'         => '9',
                'title'      => '2021./2022.',
                'current'    => '1',
                'created_at' => '2021-10-04 22:42:31',
                'updated_at' => '2021-10-04 22:42:31',
            ],
        ];

        Season::insert($seasons);
    }
}
