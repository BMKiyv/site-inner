<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
                [
                    "name"=> "Бухгалтерський облік",
                    "image"=> "/images/icons/accounting.svg"
                ],
                [
                    "name"=>"Адміністративний відділ",
                    "image"=>"/images/icons/administration.svg"
                ],    
                [                
                    "name"=> "Відділ міжнародної співпраці",
                    "image"=>"/images/icons/international.svg"
                ],
                [
                    "name"=> "Аналітичний відділ",
                    "image"=>"/images/icons/analityc.svg"
                ],
                [
                    "name"=> "Відділ цифрової трансформації",
                    "image"=> "/images/icons/it.svg"
                ],
                [
                    "name"=> "Юридичне управління",
                    "image"=> "/images/icons/lawyers.svg"
                ],
                [
                    "name"=> "Відділ маркетингу",
                    "image"=> "/images/icons/marketing.svg"
                ],
                [
                    "name"=> "Управління публічних послуг",
                    "image"=> "/images/icons/public.svg"
                ],
                [
                    "name"=> "Проектний відділ",
                    "image"=> "/images/icons/projects.svg"
                ],
                [
                    "name"=> "Відділ зв'язків з громадськістю",
                    "image"=> "/images/icons/pr.svg"
                ]
            
        ];
        foreach($items as $item){
            Department::create($item);
        }
        
    }
}
