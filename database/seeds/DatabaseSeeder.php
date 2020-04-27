<?php

use Illuminate\Database\Seeder;
use App\Fish;
use \App\Lake;
use App\User;


class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $firstUser = new User();
        $firstUser->name = 'Dima';
        $firstUser->email = 'dimka@gmail.com';
        $firstUser->email_verified_at = now();
        $firstUser->password = '$2y$10$/xUbPd3hA2CWzA4P3KhgLurWRvLa8533QDiH/JRx7OztGhRcnEGxq'; // password
        $firstUser->remember_token = '5zEO3O8EmC7CgdyM94rYx8wsuaOoZn7KOXXNMFd9CEqoIkVqNdYfc6RaAoUV';
        $firstUser->role = 4;
        $firstUser->save();
        $firstId = User::all()->last()->id;
        User::where('id', $firstId)->update(['id' => 1]);

        factory(App\User::class, 50)->create()->each(function () {
            return factory(App\User::class)->make();
        });

        $fishNames = ['Карась', 'Карп', 'Лещ', 'Щука', 'Судак', 'Налим', 'Линь', 'Плотва',
                      'Красноперка', 'Окунь', 'Сом', 'Белый Амур', 'Подлещик', 'Ерш',
                      'Толстолобик', 'Осетр', 'Язь', 'Чухонь', 'Сазан'];
        $languages = ['ua', 'ru', 'en'];

        for ($i = 0; $i < count($fishNames); $i++) {
            $fish = new Fish();
            $fish->alias = str_slug($fishNames[$i],'-','en'). '-' . $i;
            $fish->category_id = rand(1, 5);
            $fish->views = rand(1, 20);
            $fish->save();
            $id = Fish::where('id', '<>', 0)->select('id')->get()->last();
            foreach ($languages as $lang) {
                $fishData = new \App\Fish_data();
                $fishData->fish_id = $id->id;
                $fishData->language = $lang;
                $fishData->name = $fishNames[$i] . ' по ' . $lang;
                $fishData->short_description = $fishNames[$i] . ': и здесь дальше на ' . $lang;
                $fishData->description = $fishNames[$i] . ': и здесь дальше полное описание на ' . $lang;
                $fishData->save();
            }
        }


        $lakeNames = ['Днепр', 'Лазовеньки', 'Немышля', 'Уды', 'Лопань', 'Южный буг', 'Сула',
                      'Северский донец', 'Самара', 'Ворскла', 'Псел', 'Оскол', 'Ингулец',
                      'Рось', 'Случ', 'Збруч', 'Десна', 'Горинь', 'Серет', 'Старый салтов', 'Мурамское вдх'];
        for ($i = 0; $i < count($lakeNames); $i++) {
            $lake = new Lake();
            $lake->alias = str_slug($lakeNames[$i],'-','en') . '-' . $i;
            $lake->location_id = rand(1, 5);
            $lake->views = rand(1, 20);
            $lake->save();
            $id = Lake::where('id', '<>', 0)->select('id')->get()->last();
            foreach ($languages as $lang) {
                $lakeData = new \App\Lake_data();
                $lakeData->lake_id = $id->id;
                $lakeData->language = $lang;
                $lakeData->name = $lakeNames[$i] . ' по ' . $lang;
                $lakeData->short_description = $lakeNames[$i] . ': и здесь дальше на ' . $lang;
                $lakeData->description = $lakeNames[$i] . ': и здесь дальше полное описание на ' . $lang;
                $lakeData->save();
            }
        }

    }
}
