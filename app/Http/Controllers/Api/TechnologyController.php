<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use Illuminate\Http\Request;

class TechnologyController extends Controller
{
     public function index() {

        $technologies = Technology::all();

        return response()->json([
            'success' => true,
            'result' => $technologies
        ]);
    }

    public function show(string $slug){

        $technology = Technology::where('slug', $slug)->with('projects')->first();

        return response()->json([
            'success' => true,
            'result' => $technology
        ]);
    }
}
