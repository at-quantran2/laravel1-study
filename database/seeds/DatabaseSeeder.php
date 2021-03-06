<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(ProductTableSeeder::class);
        // $this->call(NewsTableSeeder::class);
        // $this->call(CateNewsTableSeeder::class);
        $this->call(ImagesTableSeeder::class);
        // $this->call([
        //     CarsTableSeeder::class,
        //     ColorsTableSeeder::class,
        //     CarColorsTableSeeder::class,
        // ]);
        $this->call(StudentsTableSeeder::class);
    }
}
class ProductTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('product')->insert(
            [['name' => 'item11', 'price' => 2200, 'cate_id' => 1],
            ['name' => 'item22', 'price' => 2300, 'cate_id' => 2],
            ['name' => 'item33', 'price' => 2400, 'cate_id' => 1],
            ['name' => 'item44', 'price' => 2500, 'cate_id' => 1],
            ['name' => 'item55', 'price' => 2600, 'cate_id' => 2],
            ['name' => 'item66', 'price' => 2700, 'cate_id' => 2]]
        );
    }
}
class CateNewsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('cate_news')->insert([
            ['name' => 'World'],
            ['name' => 'Music'],
            ['name' => 'Sport']]
        );
    }
}
class NewsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('news')->insert([
            ['title' => str_random(10), 'intro' => 'This is title 1', 'cate_id' => 1],
            ['title' => str_random(10), 'intro' => 'This is title 2', 'cate_id' => 1],
            ['title' => str_random(10), 'intro' => 'This is title 3', 'cate_id' => 1],
            ['title' => str_random(10), 'intro' => 'This is title 4', 'cate_id' => 1],
        ]);
    }
}
class ImagesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('images')->insert([
            ['name' =>'Quan_kaki_1.jpg', 'product_id' => 24],
            ['name' =>'Quan_kaki_2.jpg', 'product_id' => 24],
            ['name' =>'Quan_kaki_3.jpg', 'product_id' => 24],
            ['name' =>'Quan_kaki_4.jpg', 'product_id' => 24],
            ['name' =>'Ao_Gach_1.jpg', 'product_id' => 26],
            ['name' =>'Ao_Gach_2.jpg', 'product_id' => 26],
            ['name' =>'Ao_Gach_3.jpg', 'product_id' => 26],
            ['name' =>'Ao_Gach_4.jpg', 'product_id' => 26]
        ]);
    }
}
class CarsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('cars')->insert([
            ['name' =>'Honda', 'price' => 100000],
            ['name' =>'Toyota', 'price' => 150000],
            ['name' =>'BMW', 'price' => 300000],
            ['name' =>'Suzuki', 'price' => 250000],
            ['name' =>'Audi', 'price' => 69000]
        ]);
    }
}
class ColorsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('colors')->insert([
            ['name' =>'Red'],
            ['name' =>'Blue'],
            ['name' =>'Green'],
            ['name' =>'White']
        ]);
    }
}
class CarColorsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('car_colors')->insert([
            ['car_id' => 1, 'color_id' => 1],
            ['car_id' => 2, 'color_id' => 1],
            ['car_id' => 3, 'color_id' => 1],
            ['car_id' => 2, 'color_id' => 3],
            ['car_id' => 4, 'color_id' => 3],
            ['car_id' => 2, 'color_id' => 5]
        ]);
    }
}
class StudentsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('students')->insert([
            ['user_name' =>'Quan', 'password' => Hash::make(12345), 'level' => 1 ],
            ['username' =>'Nam', 'password' => bcrypt(12345), 'level' => 2],
            ['user_name' =>'Lan', 'password' => Hash::make(12345), 'level' => 2],
            ['user_name' =>'Tuan', 'password' => bcrypt(12345), 'level' => 1],
        ]);
    }
}

