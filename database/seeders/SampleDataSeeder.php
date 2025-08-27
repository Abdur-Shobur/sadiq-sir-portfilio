<?php
namespace Database\Seeders;

use App\Models\Banner;
use App\Models\BlogCategory;
use App\Models\GalleryCategory;
use Illuminate\Database\Seeder;

class SampleDataSeeder extends Seeder
{
    public function run()
    {
        // Get categories
        $blogCategories    = BlogCategory::all();
        $galleryCategories = GalleryCategory::all();

        // Create sample banners
        $bannerData = [
            [
                'title'           => 'Prof. Md Sadiq Iqbal',
                'subtitle'        => 'Chairman, Department of Computer Science & Engineering',
                'description'     => 'Bangladesh University',
                'additional_text' => 'At the Department of Computer Science & Engineering, under the visionary leadership of Prof. Md Sadiq Iqbal, we are committed to fostering a culture of innovation, critical thinking, and academic excellence. We believe in preparing students not just as engineers, but as future leaders who will shape the technological landscape.',
                'is_active'       => true,
                'order'           => 1,
                'image'           => 'banners/F1LVdcI2asUvqQkG1gjLcbmGtuT1Ks5vjt3FU57Y.jpg',
            ],

        ];

        foreach ($bannerData as $banner) {
            Banner::updateOrCreate(
                ['title' => $banner['title']],
                $banner
            );
        }

    }
}
