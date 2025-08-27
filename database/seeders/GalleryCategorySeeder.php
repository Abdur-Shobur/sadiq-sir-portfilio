<?php
namespace Database\Seeders;

use App\Models\GalleryCategory;
use Illuminate\Database\Seeder;

class GalleryCategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'name'        => 'Celebrations',
                'description' => 'Event photos and highlights',
                'is_active'   => true,
            ],
            [
                'name'        => 'Events',
                'description' => 'Project showcases and demonstrations',
                'is_active'   => true,
            ],
            [
                'name'        => 'Lectures',
                'description' => 'Class Lectures and others',
                'is_active'   => true,
            ],

        ];

        foreach ($categories as $category) {
            GalleryCategory::updateOrCreate(
                ['name' => $category['name']],
                $category
            );
        }
    }
}
