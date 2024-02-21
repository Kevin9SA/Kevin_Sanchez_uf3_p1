<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Film;
class actor extends Model
{
    use HasFactory;
    protected $table = 'actors';
    public function films()
    {
    return $this->belongsToMany(Film::class);
    }
}
