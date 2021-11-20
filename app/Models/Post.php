<?php

namespace App\Models;
use Illuminate\Support\HtmlString;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded =[];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);//->orderBy('created_at', 'DESC');
    }
  
    public function getPostDescription()
{
    return new HtmlString($this->description);
}
}
