<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veau extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'idBovin',
        'codeBovin',
    ];
    public $incrementing = false;
    protected $primaryKey = 'idBovin';
    
}
