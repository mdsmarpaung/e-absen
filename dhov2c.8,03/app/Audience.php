<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Audience extends Model
{
    protected $primaryKey = 'nip';

    /*
    **public function meeting()
    **{
    **    return $this->belongsTo(Meeting::class);
    **}
    */
}
