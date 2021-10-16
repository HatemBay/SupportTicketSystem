<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

use App\Models\User;
use GuzzleHttp\Psr7\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // return User::latest()->paginate(5);

        return UserResource::collection(User::all());

        // return response()->json($users);

        // $users = User::all();

        // return response()->json($users);
        // if($request->has('search')){
        //     $users = User::where('name', 'like', "%{$request->search}%")->orWhere('email', 'like', "%{$request->search}%")->get();
        // }
        // return view('users.index', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        // return User::create($request->all());
        return User::create($request->validated());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->update($request->all());

        return response()->json('Account updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {

        // $authUser = User::find(Auth::user()->id);

        // if ($user === $authUser) {
        //     return response()->json('You cannot delete your own account');
        // }
        $user->delete();
        return response()->json('Account deleted successfully');

    }

    //*************************Statistics******************************
    public function countAllAgents()
    {
        //
        $agents = User::all();
        return $agents->hasRole('agent')->count();
    }
    public function countAllCustomers()
    {
        //
        $customers = User::all();
        return $customers->hasRole('customer')->count();
    }
    //*************************Statistics******************************

    public function giveRole(String $role, String $email)
    {
        $user = User::all()->firstWhere('email', $email);
        $user->roles()->detach();
        $user->assignRole($role);
        return response()->json('Role assigned successfully');
    }

}
