<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;
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
        User::create([
            'name' => 'Rahmat',
            'username' => 'rahmat',
            'email' => 'rahmat@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        User::factory(4)->create();
        // User::create([
        //     'name' => 'Rahmatwati',
        //     'email' => 'rahmawati@gmail.com',
        //     'password' => bcrypt('12345678')
        // ]);
        // Post::create([
        //     'title' => 'Judul yang Pertama',
        //     'slug' => 'judul-yang-pertama',
        //     'excerpt' => 'Ini adalah excerpt yang pertama',
        //     'body' => 'Ini adalah body yang pertama',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);
        // Post::create([
        //     'title' => 'Judul yang Kedua',
        //     'category_id' => 2,
        //     'slug' => 'judul-yang-kedua',
        //     'excerpt' => 'Ini adalah excerpt yang Kedua',
        //     'body' => 'Ini adalah body yang kedua',
        //     'user_id' => 2
        // ]);
        // Post::create([
        //     'title' => 'Judul yang Ketiga',
        //     'category_id' => 3,
        //     'slug' => 'judul-yang-ketiga',
        //     'excerpt' => 'Ini adalah excerpt yang Ketiga',
        //     'body' => 'Ini adalah body yang Ketiga',
        //     'user_id' => 1
        // ]);
        // Post::create([
        //     'title' => 'Judul yang Keempat',
        //     'category_id' => 1,
        //     'slug' => 'judul-yang-keempat',
        //     'excerpt' => 'Ini adalah excerpt yang Keempat',
        //     'body' => 'Ini adalah body yang Keempat',
        //     'user_id' => 2
        // ]);
        // Post::create([
        //     'title' => 'Judul yang Kelima',
        //     'category_id' => 4,
        //     'slug' => 'judul-yang-kelima',
        //     'excerpt' => 'Ini adalah excerpt yang Kelima',
        //     'body' => 'Ini adalah body yang Kelima',
        //     'user_id' => 1
        // ]);
        // Post::create([
        //     'title' => 'Judul yang Keenam',
        //     'category_id' => 4,
        //     'slug' => 'judul-yang-keenam',
        //     'excerpt' => 'Ini adalah excerpt yang keenam',
        //     'body' => 'Ini adalah body yang keenam',
        //     'user_id' => 2
        // ]);

        Post::factory(30)->create();
        category::create([
            'name'=> 'Programming',
            'slug'=> 'programming'
        ]);
        category::create([
            'name'=> 'Web Design',
            'slug'=> 'web_design'
        ]);
        category::create([
            'name'=> 'Gamers',
            'slug'=> 'gamers'
        ]);
        category::create([
            'name'=> 'Software Engineer',
            'slug'=> 'software_engineer'
        ]);
    }
}
