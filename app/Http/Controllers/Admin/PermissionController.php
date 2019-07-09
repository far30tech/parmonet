<?php

namespace App\Http\Controllers\Admin;

use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PermissionController extends AdminController
{

    public function index(Request $request)
    {
        $permissions = Permission::search($request->all());
        if (sizeof($permissions) == 0) $x = 0;
        else $x = 1;
        return view('admin.permission.index',compact('permissions','x'));
    }

    public function create()
    {
        return view('admin.permission.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        permission::create([
            'name'=>$request['name'],
        ]);
        return response()->json(['key' => 'value'], 200);
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        return redirect(route('permission.index'));
    }
}
