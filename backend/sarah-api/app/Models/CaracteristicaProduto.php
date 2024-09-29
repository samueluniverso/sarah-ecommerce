<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaracteristicaProduto extends Model
{
    use HasFactory;

    protected $table = 'caracteristicas_produtos';

    public $incrementing = true;
}
