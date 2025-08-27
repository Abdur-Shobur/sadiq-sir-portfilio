<?php
namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    public function run()
    {
        $blogs = [
            [
                'blog_category_id' => 5,
                'title'            => 'The Future of AI in Education',
                'slug'             => 'the-future-of-ai-in-education',
                'image'            => 'blogs/AgDHQVjNCVaHBVahDm5nb7urPslUzQdyxGCjbOAu.jpg',
                'excerpt'          => 'How Machine Learning is Transforming the Classroom',
                'content'          => '<p>Explore how artificial intelligence is reshaping education through personalized learning, automation, and intelligent tutoring systems. This post dives into real-world applications and future possibilities.</p>',
                'status'           => 'published',
                'is_active'        => true,
                'is_published'     => true,
                'published_at'     => now(),
            ],
            [
                'blog_category_id' => 1,
                'title'            => 'The Rise of Edge AI in Smart Devices',
                'slug'             => 'the-rise-of-edge-ai-in-smart-devices',
                'image'            => 'blogs/4g0yL6uoEalV7WnjilgajczOFyDzjp08voxX53J4.jpg',
                'excerpt'          => 'How On-Device Intelligence Is Changing Everything',
                'content'          => '<p>Edge Artificial Intelligence (Edge AI) refers to deploying AI models directly on devices without relying on cloud servers for processing. This shift allows for real-time decision-making, reduced latency, lower bandwidth consumption, and enhanced data privacy. With the growth of IoT devices and smarter applications in healthcare, manufacturing, and autonomous vehicles, Edge AI is becoming a game-changer. This blog explores how Edge AI works, its advantages, challenges, and real-world applications shaping the future of intelligent systems.</p>',
                'status'           => 'published',
                'is_active'        => true,
                'is_published'     => true,
                'published_at'     => now(),
            ],
            [
                'blog_category_id' => 5,
                'title'            => 'Harnessing Big Data for Better Healthcare Outcomes',
                'slug'             => 'harnessing-big-data-for-better-healthcare-outcomes',
                'image'            => 'blogs/NxVKBp9wg9EvW7pi1ky5dCHHTyYEooP7w2xUZ2hm.jpg',
                'excerpt'          => 'A Look into Predictive Analytics in Modern Medicine',
                'content'          => '<p>In today\'s digital age, healthcare providers are flooded with vast amounts of data from EHRs, wearable devices, and genomic studies. When properly harnessed, this data can improve diagnostics, forecast disease progression, and tailor treatments to individual patients. This blog delves into how predictive analytics powered by big data is transforming public health, improving efficiency, and enabling data-driven clinical decisions. It also discusses the challenges in data security, interoperability, and ethical considerations of AI in medicine.</p>',
                'status'           => 'published',
                'is_active'        => true,
                'is_published'     => true,
                'published_at'     => now(),
            ],
        ];

        foreach ($blogs as $blog) {
            Blog::updateOrCreate(
                ['slug' => $blog['slug']],
                $blog
            );
        }
    }
}
