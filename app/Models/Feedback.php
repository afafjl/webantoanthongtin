<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    use HasFactory;
    protected $guarded =[];
    public function user(){
        return $this->belongsTo(User::class);
    }

}
