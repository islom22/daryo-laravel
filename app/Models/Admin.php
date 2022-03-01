<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Admin extends Model
{
    use HasFactory;
    protected $table = 'admins';
    protected $fillable = [
        'title',
        'text',
        'profile_image',
        'ctegory_id'
    ];

    public function category(){
        return $this->hasOne(Category::class, 'id', "category_id");
    }
}
