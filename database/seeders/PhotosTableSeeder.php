<?php

namespace Database\Seeders;

use App\Models\Photo;
use Illuminate\Database\Seeder;

class PhotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
                [
                    "title"=> "Харків",
                    "path"=> "/storage/images/other/Харків.png",
                    "date"=> "2023-01-02"
                ],
                [
                    "title"=> "Чернігів",
                    "path"=> "/storage/images/other/GRB_2948.png",
                    "date"=> "2023-01-19"
                ],
                [
                    "title"=> "Ірпінь",
                    "path"=> "/storage/images/other/DSC_1813.png",
                    "date"=> "2023-02-16"
                ],
                [
                    "title"=> "Буча",
                    "path"=> "/storage/images/other/DSC_8415.png",
                    "date"=> "2023-02-28"
                ],
                [
                    "title"=> "Бородянка",
                    "path"=> "/storage/images/other/Бородянка.png",
                    "date"=> "2023-03-22"
                ],
                [
                    "title"=> "Київ",
                    "path"=> "/storage/images/other/DJI_0058.png",
                    "date"=> "2023-03-29"
                ]

        ];
        foreach($items as $item){
            Photo::create($item);
        }
        
    }
}
