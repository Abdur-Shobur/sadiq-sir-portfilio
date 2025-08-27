<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'logo',
        'email',
        'phone',
        'address',
        'image',
    ];

    public function socialMedia()
    {
        return $this->hasMany(SocialMedia::class);
    }
}
