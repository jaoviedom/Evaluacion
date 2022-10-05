<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Idea;

class HomeController extends Controller
{
    public function listarIdeas()
    {
        $ideas = Idea::orderBy('id', 'desc')->get();
        return view('ideas.index', compact('ideas'));
    }
}
