<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    // use HasFactory; 
    protected $table = 'annonce';
    protected $primaryKey = 'id_annonce';


    protected $fillable = [
        'title',
        'description',
        'location',
        'type',
        'status',
        'category',
        'image',
        'date_of_event',
        'user_id',
    ];
    public $timestampes = false;

    public function comments(){
        return $this->hasMany(Comment::class ,'announcement_id');
    }
    public function users(){
        return $this->belongsTo(User::class ,'user_id');
    }
}
