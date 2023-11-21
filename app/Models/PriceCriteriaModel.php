<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceCriteriaModel extends Model
{
    use HasFactory;

    protected $table = 'price_criterias';

    protected $fillable = [
        'name'
    ];
}
