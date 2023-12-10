<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{

    public function show($id){
        $user = User::with('role')->find($id);
        if($user){
            return response()->json([
                'status' => true,
                'data' => $user,
            ], 200);
        }
    }


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
        if ($request->ajax()) {
            $users = User::with('role')->orderBy('id', 'desc')->get();
            return DataTables::of($users)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn =
                    '<a href="#editUserModal" class="btn btn-success btn-sm" data-toggle="modal" onclick=showUser("' . $row->id .'")>Edit</a>
                    <a href="#deleteUserModal" class="m-1 delete btn btn-danger btn-sm" data-toggle="modal" onclick=deleteConfirm("' . $row->id .'")>Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function update(UserUpdateRequest $request, $id){
        $data = $request->safe()->only(['name', 'address', 'role_id']);
        if($request->password){
            $data['password'] = Hash::make($request->password);
        }
        $user = User::find($id)->update($data);

        if($user){
            return response()->json([
                'status' => true,
                'message' => 'User successfully updated',
            ], 200);
        }
    }


    public function delete($id){
        $user = User::find($id)->delete();
        if($user){
            return response()->json([
                'status' => true,
                'message' => 'User deleted updated',
            ], 200);
        }
    }


}
