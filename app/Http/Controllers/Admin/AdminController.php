<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin',['only' => 'index','edit']);
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
        $roles = Role::latest()->get();
        Auth::logout();
        return view('admin.user.create',compact('roles'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'          => 'required',
            'email'         => 'required',
            'password'      => 'required'
        ]);
        // store in the database
        $admins = new Admin;
        $admins->name = $request->name;
        $admins->email = $request->email;
        $admins->password=bcrypt($request->password);
        $admins->save();
        return redirect()->route('admin.auth.login');
    }
}