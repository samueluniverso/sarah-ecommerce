<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Products extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'products';

    /**
     * @var bool
     */
    public $incrementing = false;
    public $timestamps = true;

    /**
     * @var int
     */
    protected $primaryKey = 'id';

    /**
     * Columns
     */
    public $name = 'name';
    public $price = 'price';
    public $code = 'code';

    public function category(): HasOne
    {
        return $this->hasOne(Categories::class);
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'id' => 'bigint',
            'price' => 'float',
        ];
    }

}
