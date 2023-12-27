<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $guarded = false;
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }
}
