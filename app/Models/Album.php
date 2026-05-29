<?php

namespace App\Models;
use App\Models\Songs;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Album extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    public function songs()
    {
        return $this->hasMany(Songs::class);
    }
}
