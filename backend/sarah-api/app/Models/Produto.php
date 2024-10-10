<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Produto extends Model
{
    use HasFactory;

    protected $table = 'produtos';

    public $incrementing = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome',
        'is_destaque',
        'preco'
    ];

    public function marca(): HasOne
    {
        return $this->hasOne(Marca::class, 'id', 'fk_marca');
    }

    public function caracteristicas(): HasMany
    {
        return $this->hasMany(CaracteristicaProduto::class, 'fk_produto', 'id');
    }

    public function produtosCategorias(): HasMany
    {
        return $this->hasMany(ProdutoCategoria::class, 'fk_produto', 'id');
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [];
    }
}
