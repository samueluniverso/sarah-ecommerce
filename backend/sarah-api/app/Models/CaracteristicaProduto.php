<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class CaracteristicaProduto extends Model
{
    use HasFactory;

    protected $table = 'caracteristicas_produtos';

    public $incrementing = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'cor',
        'fk_medida'
    ];

    public function medida(): HasOne
    {
        return $this->hasOne(Medida::class, 'id', 'fk_medida');
    }
}
