<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pedido extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = 'pedidos';

    public $incrementing = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [];

    public function produtos(): HasMany
    {
        return $this->hasMany(PedidoProduto::class, 'fk_pedido', 'id');
    }

    public function pessoa(): HasOne
    {
        return $this->hasOne(Pessoa::class, 'id', 'fk_pessoa');
    }

    public function endereco(): HasOne
    {
        return $this->hasOne(Endereco::class, 'id', 'fk_endereco');
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
