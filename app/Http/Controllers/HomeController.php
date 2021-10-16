<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //     Role::create(['name' => 'admin']);
        // $permission = Permission::create(['name' => 'edit depts']);
        // $role = Role::findById(1);
        // $permission = Permission::findById(2);
        // $role->givePermissionTo($permission);
        // $permission->assignRoleTo($role);
        // $permission->removeRole($role);
        // $role->revokePermission($permission);

        return view('dashboard');
    }
}
