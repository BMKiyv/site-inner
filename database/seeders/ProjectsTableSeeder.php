<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
                [
                    "title"=> "Інститут гостинності",
                    "mission"=> "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis laboriosam optio incidunt, expedita quos accusamus animi! Esse ad nesciunt, necessitatibus asperiores rem ratione fugit soluta explicabo omnis rerum maxime non.",
                    "aim"=> "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis laboriosam optio incidunt, expedita quos accusamus animi! Esse ad nesciunt, necessitatibus asperiores rem ratione fugit soluta explicabo omnis rerum maxime non."
                ],
                [
                    "title"=> "Мемориалізація",
                    "mission"=> "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis laboriosam optio incidunt, expedita quos accusamus animi! Esse ad nesciunt, necessitatibus asperiores rem ratione fugit soluta explicabo omnis rerum maxime non.",
                    "aim"=> "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis laboriosam optio incidunt, expedita quos accusamus animi! Esse ad nesciunt, necessitatibus asperiores rem ratione fugit soluta explicabo omnis rerum maxime non."
                ],    
                [                
                    "title"=> "Єдиний Туристичний Реєстр",
                    "mission"=> "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis laboriosam optio incidunt, expedita quos accusamus animi! Esse ad nesciunt, necessitatibus asperiores rem ratione fugit soluta explicabo omnis rerum maxime non.",
                    "aim"=> "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis laboriosam optio incidunt, expedita quos accusamus animi! Esse ad nesciunt, necessitatibus asperiores rem ratione fugit soluta explicabo omnis rerum maxime non."
                ]
        ];
        foreach($items as $item){
            Project::create($item);
        }
        
    }
}
