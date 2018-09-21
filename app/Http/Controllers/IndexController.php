<?php

namespace App\Http\Controllers;

use App\User;
use App\Animal;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
    	$users = User::all();

    	return view('welcome', compact('users'));
    }

    public function show(User $user)

    {	
    	return view('show', compact('user'));
    }

    public function edit(User $user)
    {
    	return view('edit', compact('user'));
    }

    public function update(User $user)
    {
    	dd($user);
    }
}
