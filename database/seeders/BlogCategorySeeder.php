<?php
namespace Database\Seeders;

use App\Models\BlogCategory;
use Illuminate\Database\Seeder;

class BlogCategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'name'        => 'Thesis & Dissertation Spotlights',
                'slug'        => 'thesis-dissertation-spotlights',
                'description' => 'Thesis & Dissertation Spotlights',
                'is_active'   => true,
            ],
            [
                'name'        => 'Conference Highlights',
                'slug'        => 'conference-highlights',
                'description' => 'Conference Highlights',
                'is_active'   => true,
            ],
            [
                'name'        => 'Student Projects',
                'slug'        => 'student-projects',
                'description' => 'Student Projects',
                'is_active'   => true,
            ],
            [
                'name'        => 'Research & Innovation',
                'slug'        => 'research-innovation',
                'description' => 'Research & Innovation',
                'is_active'   => true,
            ],
            [
                'name'        => 'Faculty Insights',
                'slug'        => 'faculty-insights',
                'description' => 'Faculty Insights',
                'is_active'   => true,
            ],
        ];

        foreach ($categories as $category) {
            BlogCategory::updateOrCreate(
                ['name' => $category['name']],
                $category
            );
        }
    }
}
