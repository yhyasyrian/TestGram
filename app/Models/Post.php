<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'description',
        'image',
        'slug'
    ];
    public function owner()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function image():string
    {
        if (preg_match('/^(http|https):\/\/\S/',$this->image))
            return $this->image;
        return asset('storage/'.$this->image);
    }
}
