<?php
namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        About::create([
            'title'       => 'About Me',
            'subtitle'    => 'Chairman, Educator & Innovator in Computer Science & Engineering',
            'description' => 'Professor Md Sadiq Iqbal is a passionate academic and visionary leader dedicated to advancing computer science education, research, and innovation. As Chairman of the Department of Computer Science & Engineering at Bangladesh University, he strives to empower students and researchers with cutting-edge knowledge and practical skills that drive technological advancement.',
            'image1'      => 'abouts/OVh46YoVDtAAQ5GDtAg0vUlyQFYpcSCCwSfNzVko.jpg',
            'image2'      => 'abouts/iQJ7mAAHxJC0Gpz8JspGoUhcd7wQepozSw0jEsM7.jpg',
            'is_active'   => true,
        ]);
    }
}
