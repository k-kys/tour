<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BaseController extends Controller
{
    public function index()
    {
        $hotTours = Tag::where('name', 'like', 'hot')->tours()->select('id', 'name');
        $newTours = Tour::select('id', 'name')->orderByDesc('created_at');
        $tourSuggested = ;
    }
}
