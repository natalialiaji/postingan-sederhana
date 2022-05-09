<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

class Post
{
    private static $blog_posts = [
        [
        "title" => "Judul Post Pertama",
        "slug" => "judul-post-pertama",
        "author" => "Rahmat",
        "img" => "man-removebg-preview.png",
        "body" => "
        Expedita dolor doloremque ea delectus corporis nihil temporibus adipisci illum dolore a, iure ipsam maiores distinctio veniam qui. Deserunt, adipisci soluta. Necessitatibus perspiciatis alias autem libero dolores dolorem sunt est consequuntur. Natus saepe nam similique soluta, ex nihil quam officia ea dolores? Voluptatibus unde ducimus assumenda, velit corrupti illum, praesentium fuga facilis voluptates error culpa necessitatibus natus id voluptate blanditiis sit earum eligendi nesciunt molestias! Neque nulla quaerat laborum numquam sapiente facilis fuga ipsa, optio repellat, corporis aliquam. Illo quae ipsam quasi. Quae labore incidunt, explicabo nihil maiores rerum porro harum. Possimus.",
    ],
    [
        "title" => "Judul Post Kedua",
        "slug" => "judul-post-kedua",
        "author" => "Rahma",
        "img" => "woman-removebg-preview.png",
        "body" => "nihil temporibus adipisci illum dolore a, iure ipsam maiores distinctio veniam qui. Deserunt, adipisci soluta. Necessitatibus perspiciatis alias autem libero dolores dolorem sunt est consequuntur. Natus saepe nam similique soluta, ex nihil quam officia ea dolores? Voluptatibus unde ducimus assumenda, velit corrupti illum, praesentium fuga facilis voluptates error culpa necessitatibus natus id voluptate blanditiis sit earum eligendi nesciunt molestias! Neque nulla quaerat laborum numquam sapiente facilis fuga ipsa, optio repellat, corporis aliquam. Illo quae ipsam quasi. Quae labore incidunt, explicabo nihil maiores rerum porro harum. Possimus."
    ],
    [
        "title" => "Judul Post Ketiga",
        "slug" => "judul-post-ketiga",
        "author" => "Rahmawati",
        "img" => "thumb-350-857988.jpg",
        "body" => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Expedita dolor doloremque ea delectus corporis nihil temporibus adipisci illum dolore a, iure ipsam maiores distinctio veniam qui. Deserunt, adipisci soluta. Necessitatibus perspiciatis alias autem libero dolores dolorem sunt est consequuntur. Natus saepe nam similique soluta, ex nihil quam officia ea dolores? Voluptatibus unde ducimus assumenda, velit corrupti illum, praesentium fuga facilis voluptates error culpa necessitatibus natus id voluptate blanditiis sit earum eligendi nesciunt molestias! Neque nulla quaerat laborum numquam sapiente facilis fuga ipsa, optio repellat, corporis aliquam. Illo quae ipsam quasi. Quae labore incidunt, explicabo nihil maiores rerum porro harum. Possimus."
    ]
    ];

    public static function all(){
        return collect(self::$blog_posts);
    }
    public static function find($slug){
        $posts = static::all();
        // $post = [];
        // foreach ($posts as $p) {
        //    if ($p['slug'] === $slug) {
        //        $post = $p;
        //    }
        // }
        
        return $posts->firstWhere('slug', $slug);
    }

}
