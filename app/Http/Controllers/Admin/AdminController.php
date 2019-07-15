<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth:admin', ['only' => 'index', 'edit']);
    }

    public function fetch()
    {
        $admins = Admin::orderBy('updated_at', 'desc')->paginate(7);
        return response()->json($admins);
    }

    public function search(Request $request)
    {

        if (isset($request->id)) {
            $data = Admin::where('id', 'like', '%' . $request->id . '%')->orderBy('updated_at', 'desc')->paginate(7);
        }
        if (isset($request->name)) {
            $data = Admin::where('name', 'like', '%' . $request->name . '%')->orderBy('updated_at', 'desc')->paginate(7);
        }
        if (isset($request->email)) {
            $data = Admin::where('email', 'like', '%' . $request->email . '%')->orderBy('updated_at', 'desc')->paginate(7);
        }

        return response()->json($data);
    }

    public function index(Request $request)
    {
        $users = Admin::search($request->all());
        if (sizeof($users) == 0) $x = 0;
        else $x = 1;

        return view('admin.user.index', compact('users', 'x'));
    }

    public function create()
    {

        Auth::logout();
        return view('admin.auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:2', 'confirmed'],
            'roles' => 'required',
        ]);

        $x = Admin::where('email', $request['email'])->first();
        if (isset($x)) {
            $x->roles()->detach();
            $x->delete();
        }

        $admin = Admin::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        $admin->roles()->attach($request['roles']);

        return response()->json(['key' => 'value'], 200);
    }

    public function getRoles()
    {
        $roles = Role::orderBy('updated_at', 'desc')->get();
        return response()->json($roles);
    }

    public function fetchRole(Admin $id)
    {
        $a = $id->roles;
        $roles=array();
        foreach ($a as $role){
            array_push($roles,$role->title);
        }
        $roles=implode(" - ",$roles);

        return response()->json($roles);
    }

    public function delete(Admin $id)
    {
        $id->roles()->detach();
        $id->delete();
        return response()->json(['key' => 'value'], 200);
    }
}