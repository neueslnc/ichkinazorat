<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DopCriteriaModel extends Model
{
    use HasFactory;

    protected $table = 'dop_criterias';

    protected $fillable = [
        'name',
        'main_criteria_id'
    ];

    public function criteria_on_price()
    {
        return $this->hasMany(CriteriaOnPriceModel::class, 'dop_criteria_id', 'id');
    }
}
