<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Claims extends Model
{
    protected $table = 'claims';
    
    protected $fillable = [
        'type',
        'message',
        'status',
        'user_id',
        'announcement_id',

    ];
    public $timestampes = false;
    
}
