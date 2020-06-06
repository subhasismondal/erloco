<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loco extends Model
{
    protected $fillable = ['locono', 'trainno', 'source', 'destination','ddate','time','enteredby','homeshed','idate','inspection','division'];
}
