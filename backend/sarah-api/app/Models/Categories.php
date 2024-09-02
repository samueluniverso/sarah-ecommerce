<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'categories';

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

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'id' => 'bigint',
        ];
    }
}
