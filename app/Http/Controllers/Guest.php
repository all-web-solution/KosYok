<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use Illuminate\Http\Request;

class Guest extends Controller
{
    public function welcome()
    {
        $kamar = Kamar::all();
        return view('welcome', compact('kamar')); // Mengirim $kamars (plural)
    }
}
