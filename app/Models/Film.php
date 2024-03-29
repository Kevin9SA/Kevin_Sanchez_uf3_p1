<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\actor;
class Film extends Model
{
    use HasFactory;
    protected $table = 'films';
    public function actors()
    {
    return $this->belongsToMany(actor::class);
    }
}
