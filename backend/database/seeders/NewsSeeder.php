<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\News;
use Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    public function run()
    {
        News::create([
            'title' => 'Berita Kedua',
            'slug' => Str::slug('Berita kedua'),
            'content' => 'Ini adalah konten berita kedua.',
        ]);
    }
}