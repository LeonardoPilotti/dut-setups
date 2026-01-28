<?php

namespace App\Http\Controllers;

use App\Models\Track;

class DashboardController extends Controller
{
 public function index()
{
    $tracks = Track::orderBy('id')->get();
    return view('dashboard.index', compact('tracks'));
}
}
