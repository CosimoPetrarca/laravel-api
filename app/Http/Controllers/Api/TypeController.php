<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index() {

        $types = Type::all();

        return response()->json([
            'success' => true,
            'result' => $types
        ]);
    }

    public function show(string $slug){

        $type = Type::where('slug', $slug)->with('projects')->first();

        return response()->json([
            'success' => true,
            'result' => $type
        ]);
    }
}
