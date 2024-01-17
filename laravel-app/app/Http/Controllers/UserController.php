<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json([
            'Message' => 'API USER',
            'user list' => $users,
            'status_code' => 200
        ], 200);
    }
}
