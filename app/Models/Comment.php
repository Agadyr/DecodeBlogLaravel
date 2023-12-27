<?php

namespace App\Models;

use Carbon\Carbon;
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
    public function getDateAsCarbonAttribute(){
        return Carbon::parse($this->updated_at);
    }
}
