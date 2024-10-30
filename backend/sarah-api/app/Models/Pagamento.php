<?php

namespace App\Models;

use Database\Seeders\FormaPagamentoSeeder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pagamento extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pagamentos';

    public $incrementing = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [];

    public function pedido():  HasOne
    {
        return $this->hasOne(Pedido::class, 'id', 'fk_pedido');
    }

    public function formaPagamento() : HasOne
    {
        return $this->hasOne(FormaPagamento::class, 'id', 'fk_forma_pagamento');
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
