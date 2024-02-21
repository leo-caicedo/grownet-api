<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return response()->json(['msg' => 'Todos los productos']);
    }

    public function show()
    {
        return response()->json(['msg' => 'Un producto']);
    }
}
