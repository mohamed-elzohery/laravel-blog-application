<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'user_id',
        'comments'
    ];

    public $timestamps = true;

    public function user(){
        return $this->belongsTo(User::class);
    } 

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id');;
    }

    
}