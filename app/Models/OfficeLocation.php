<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @attribute string $name
 * @attribute integer $offices
 * @attribute float $price
 * @attribute integer $tables
 * @attribute float $sqmt
 */
class OfficeLocation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'offices',
        'price',
        'tables',
        'sqmt',
    ];
}
