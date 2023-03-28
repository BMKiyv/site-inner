<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
                [
                    "date"=> "2023-03-28",
                    "description"=> "Lorem ipsum dolor sit, amet consectetur ",
                    "image"=> "/images/image1.png"
                ],
                [
                    "date"=> "2023-04-15",
                    "description"=> "Lorem ipsum dolor sit, amet consectetur ",
                    "image"=> "/images/image2.png"
                ],    
                [                
                    "date"=> "2023-04-19",
                    "description"=> "Lorem ipsum dolor sit, amet consectetur ",
                    "image"=> "/images/image3.png"
                ]
        ];
        foreach($items as $item){
            Article::create($item);
        }
        
    }
}
