<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @see https://laravel.com/docs/8.x/eloquent
 */
class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuarios';

    protected $fillable = ['sigla', 'nome', 'lotacao_id', 'cargo_id', 'funcao_id'];

    public function lotacao(): BelongsTo
    {
        return $this->belongsTo(Lotacao::class, 'lotacao_id', 'id');
    }

    public function cargo(): BelongsTo
    {
        return $this->belongsTo(Cargo::class, 'cargo_id', 'id');
    }

    public function funcao(): BelongsTo
    {
        return $this->belongsTo(Funcao::class, 'funcao_id', 'id');
    }

    public function perfil(): BelongsTo
    {
        return $this->belongsTo(Perfil::class, 'perfil_id', 'id');
    }

    public function impressoes(): HasMany
    {
        return $this->hasMany(Impressao::class, 'usuario_id', 'id');
    }

    /**
     * Define o escopo padrão de ordenação do modelo.
     */
    public function scopeSort(Builder $query): Builder
    {
        return $query->orderBy('nome', 'asc');
    }
}
