<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    protected $table='operators';
    protected $fillable = ['nama_instansi', 'nama_operator', 'username', 'password', 'foto'];
}
