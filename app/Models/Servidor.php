<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @see https://laravel.com/docs/8.x/eloquent
 */
class Servidor extends Model
{
    use HasFactory;

    protected $table = 'servidores';

    protected $fillable = ['nome'];

    public function localidades(): BelongsToMany
    {
        return $this->belongsToMany(Localidade::class, 'localidade_servidor', 'servidor_id', 'localidade_id')->withTimestamps();
    }

    public function impressoes(): HasMany
    {
        return $this->hasMany(Impressao::class, 'servidor_id', 'id');
    }

    /**
     * Define o escopo padrão de ordenação do modelo.
     */
    public function scopeSort(Builder $query): Builder
    {
        return $query->orderBy('nome', 'asc');
    }
}
