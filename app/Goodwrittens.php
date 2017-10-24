<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goodwrittens extends Model
{
    protected $table = 'goodwrittens';

    protected $fillable = ['describe','account','ciphertext','operation','password'];
}
