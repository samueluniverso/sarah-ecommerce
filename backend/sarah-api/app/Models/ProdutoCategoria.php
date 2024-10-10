<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ProdutoCategoria extends Model
{
    use HasFactory;

    protected $table = 'produtos_categorias';

    public $incrementing = true;

    public function medidas(): HasOne
    {
        return $this->hasOne(Categoria::class, 'fk_categoria', 'id');
    }
}
