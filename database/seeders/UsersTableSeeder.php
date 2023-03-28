<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                "name"=> "Бородай Геогій",
                "email"=> "goga@dartu.com",
                "department_id"=> 5,
                "position"=> "главспец",
                "birthday"=> "1999-06-16",
                "phone"=>"+380635436543",
                "is_admin"=>0,
                "password"=>''
            ],
            [
                "name"=> "Підгурський Ігор",
                "email"=> "pighur@dartu.com",
                "department_id"=> 3,
                "position"=> "главспец",
                "birthday"=> "2000-04-24",
                "phone"=>"+380984565678",
                "is_admin"=>0,
                "password"=>''
            ],
            [
                "name"=> "Марусяк Саша",
                "email"=> "sasha@dartu.com",
                "department_id"=> 9,
                "position"=> "главспец",
                "birthday"=> "2001-05-13",
                "phone"=>"+380503456565",
                "is_admin"=>0,
                "password"=>''
            ],
            [
                "name"=> "Олексенко Юлія",
                "email"=> "julia@dartu.com",
                "department_id"=> 9,
                "position"=> "главспец",
                "birthday"=> "1997-07-23",
                "phone"=>"+380687654321",
                "is_admin"=>0,
                "password"=>''
            ],
            [
                "name"=> "Свистунова Леся",
                "email"=> "lesya@dartu.com",
                "department_id"=> 2,
                "position"=> "главспец",
                "birthday"=> "1986-10-06",
                "phone"=>"+380985674563",
                "is_admin"=>0,
                "password"=>''
            ],
            [
                "name"=> "Циганок Максим",
                "email"=> "maks@dartu.com",
                "department_id"=> 8,
                "position"=> "главспец",
                "birthday"=> "1984-06-26",
                "phone"=>"+380973344543",
                "is_admin"=>0,
                "password"=>''
            ],
            [
                "name"=> "Халюк Настя",
                "email"=> "nastya@dartu.com",
                "department_id"=> 6,
                "position"=> "главспец",
                "birthday"=> "1997-02-11",
                "phone"=>"+380685657654",
                "is_admin"=>0,
                "password"=>''
            ],
            [
                "name"=> "Загородня Віка",
                "email"=> "vika@dartu.com",
                "department_id"=> 2,
                "position"=> "главспец",
                "birthday"=> "1989-09-14",
                "phone"=>"+380934567645",
                "is_admin"=>0,
                "password"=>''
            ]
            ];
            foreach ($items as $item){
                User::create($item);
            }
    }
}
