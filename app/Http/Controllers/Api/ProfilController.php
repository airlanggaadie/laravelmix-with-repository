<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class ProfilController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('jwt.auth');
    }
    public function index()
    {
     
        $user = Auth::user();

        return response()->json([
            'status' => true,
            'data' => $user
        ]);
    }
}
