<?php

namespace App\Models;
use App\Models\Album;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Songs extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'album_id'
    ];
    public function album()
    {
        return $this->belongsTo(Album::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

}
