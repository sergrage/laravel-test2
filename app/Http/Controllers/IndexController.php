<?php

namespace App\Http\Controllers;

use App\User;
use App\Animal;
use App\Role;

use Illuminate\Validation\Rule;

use Illuminate\Http\Request;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;

use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
    	$users = User::all();

        //dd(Auth::user()->animal);

    	return view('users.welcome', compact('users'));
    }

    public function show(User $user)

    {	
    	return view('users.show', compact('user'));
    }


    public function create()
    {
        $roles = Role::all();

        //dd($roles);

        return view('users.create', compact('roles'));
    }

    public function store(UserCreateRequest $request)
    {
    //     dd($request);
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret,
        ]);

        if($request['animalName']) {
            $animal = Animal::create([
                'user_id' => $user->id,
                'name' => $request['animalName'],
                'type' => $request['animalType'],
            ]);
       }
        
        $user->roles()->attach($request->input('roles'));

        return redirect('/users');

    }

    public function edit(User $user)
    {
    	return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $user->update([
            'name' => $request['name'],
            'email' => $request['email'],
        ]); 
    }

    public function destroy(User $user)
    {
        $user->roles()->detach();
        $user->animal()->delete();
        $user->delete();
        return redirect('/users');
    }
}
//unique:table,column,except,idColumn