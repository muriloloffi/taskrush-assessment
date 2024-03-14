<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $attributes = [
        'title' => 'Sem título',
        'description' => 'Insira uma descrição.',
    ];

    protected $fillable = [
        'title',
        'description',
    ];

    public function owner()
    {
        return $this->belongsTo('App\Models\User', 'owner_id');
    }
}
