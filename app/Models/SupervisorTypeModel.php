<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupervisorTypeModel extends Model
{
    use HasFactory;

    protected $table = 'supervisor_types';

    protected $fillable = [
        'name',
        'id'
    ];
}