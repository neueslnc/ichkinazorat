<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainCriteriaModel extends Model
{
    use HasFactory;

    protected $table = 'main_criterias';

    protected $fillable = [
        'name'
    ];

    public function dop_criteria(){
        return $this->hasMany(DopCriteriaModel::class, 'main_criteria_id', 'id');
    }
}
