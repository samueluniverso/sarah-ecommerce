<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ImagemProduto extends Model
{
    use HasFactory;

    protected $table = 'imagens_produtos';

    public $incrementing = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'ref_produto'
    ];

    public function imagem(): HasOne
    {
        return $this->hasOne(Imagem::class, 'id', 'fk_imagem');
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
