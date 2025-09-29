<?php

namespace App\Http\Controllers\Guide;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Show the guide dashboard
    public function index()
    {
        return view('guide.dashboard');
    }
}
