<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjetController extends Controller
{
    public function index()
    {
        return view('projets.index');
    }
}
