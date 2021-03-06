<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Goodwrittens extends Model
{
    use softDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'goodwrittens';

    protected $fillable = ['describe','account','ciphertext','operation','password'];
}
