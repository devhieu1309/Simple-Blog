<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $posts = Post::all();
        $tags = Tag::all();

        foreach ($posts as $post) {
            // Chọn ngẫu nhiên 1-3 tag cho mỗi post
            $randomTags = $tags->random(rand(1, 3))->pluck('id')->toArray();

            // Thêm vào bảng trung gian post_tag
            $post->tags()->attach($randomTags);
        }
    }
}
