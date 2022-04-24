<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;
    protected $table='currency';

    CONST FROM_CB_RU = 1;
    protected $fillable = [
        'valuteID',
        'numCode',
        'сharCode',
        'nominal',
        'name',
        'value',
        'from',
        'when'
    ];
}
