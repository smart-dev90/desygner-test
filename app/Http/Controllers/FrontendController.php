<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Photo;
use App\Models\Tag;

use Str;

class FrontendController extends Controller
{
    public function home() {
        return view('frontend');
    }
}
