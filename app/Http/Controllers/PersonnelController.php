<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PersonnelController extends Controller
{
    public function create()
    {
        return view('personnel.create');
    }

    public function index()
    {
        return view('personnel.index');
    }
}