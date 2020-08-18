<?php

namespace App\Http\Controllers;

use App;
use App\Audience;
use App\Meeting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CobaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tes()
    {
        dd(Auth::guard('operator'));
    }

}
