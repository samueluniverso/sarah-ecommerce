<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PedidoProduto extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = 'pedidos_produtos';

    public $incrementing = true;
}
