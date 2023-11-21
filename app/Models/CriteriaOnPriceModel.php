<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CriteriaOnPriceModel extends Model
{
    use HasFactory;

    protected $table = 'criteria_on_prices';

    protected $fillable = [
        'dop_criteria_id',
        'criteria_price_id',
        'price'
    ];
}
