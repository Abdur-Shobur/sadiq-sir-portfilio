<?php
namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Profile::create([
            'logo'    => 'profiles/BbzmaHG4pJ1cgxeXULIDQyOKbzsu3cmdymwgfHqV.png',
            'email'   => 'sadiq.iqbal@bu.edu.bd',
            'phone'   => '+8801755559312',
            'address' => 'Mohammadpur, Dhaka, Bangladesh',
            'image'   => null,
        ]);
    }
}
