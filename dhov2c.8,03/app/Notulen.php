<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notulen extends Model
{
    protected $primaryKey = 'id_notulen';

    protected $fillable = ['id_rapat', 'notulen'];
}
