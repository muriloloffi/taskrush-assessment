<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function members(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }
}
