<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function create(UserCreateRequest $request){
        $data = $request->safe()->only(['name', 'email', 'address', 'role_id']);
        $user = User::create([
            ...$data,
            'password' => Hash::make($request->password)
        ]);

        if($user){
            return response()->json([
                'status' => true,
                'message' => 'User successfully created',
            ], 200);
        }
    }


    public function list(Request $request){
        $users = User::with('role')->get();

        if ($request->ajax()) {
            $users = User::with('role')->get();
            return DataTables::of($users)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }


}
