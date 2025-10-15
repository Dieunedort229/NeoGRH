<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjetController extends Controller
{
    public function create()
    {
        return view('projets.create');
    }

    public function index()
    {
        return view('projets.index');
    }
}
