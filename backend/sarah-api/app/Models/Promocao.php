<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Promocao extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = 'promocoes';

    public $incrementing = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'dt_inicio',
        'dt_fim',
        'vl_percentual',
        'vl_absoluto'
    ];

    // public function produto() : HasOne
    // {
    //     return $this->hasOne(Produto::class, 'id', 'fk_produto');
    // }

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
