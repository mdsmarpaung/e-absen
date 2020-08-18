<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $primaryKey = 'id_foto';

    protected $fillable = ['id_rapat', 'foto'];
}
