<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PracticeController extends Controller
{
    public function index()
    {
        return view('pages.practice.index'); // Pastikan file blade ada di lokasi ini
    }
}
