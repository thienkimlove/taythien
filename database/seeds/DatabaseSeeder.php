<?php

use App\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // $this->call(CategorySeeder::class);

    }
}
class CategorySeeder extends Seeder
{
    public function run()
    {
        DB::statement("SET foreign_key_checks=0");

        Model::unguard();

        DB::table('categories')->truncate();

        Category::create([
            'name' => 'Tin tức',
            'desc' => 'Tin tức'
        ]);

        Category::create([
            'name' => 'Sự kiện',
            'desc' => 'Sự kiện'
        ]);


        Model::reguard();

        DB::statement("SET foreign_key_checks=1");
    }
}
