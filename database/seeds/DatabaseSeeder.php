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
        //     ProductTableSeeder::class,
        //     CateNewsTableSeeder::class
        // ]);
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
