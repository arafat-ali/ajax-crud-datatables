<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function list(){
        $roles = Roles::all();
        return response()->json([
            'status' => true,
            'message' => 'User successfully created',
            'data'=>$roles
        ], 200);
    }
}
