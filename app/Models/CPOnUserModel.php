<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CPOnUserModel extends Model
{
    use HasFactory;

    protected $table = 'c_p_on_users';

    protected $fillable = [
        'dop_criteria_id',
        'criteria_price_id',
        'price'
    ];
}
