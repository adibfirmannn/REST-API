<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function getUsers()
    {
        $users = DB::table('users')->select('name', 'email',)->orderBy('name', 'ASC')->get();
        return response()->json($users, 200);
    }
}
