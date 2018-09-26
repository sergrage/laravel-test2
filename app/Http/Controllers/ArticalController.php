<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Article;
use App\User;

class ArticalController extends Controller
{
    public function create(Request $request)
    {
    	
    	$this->validate($request,[
    		'title' => 'required|string|min:8|max:255',
    	]);

    	$articleTitle = Article::create([
    		'title' => $request['title'],
    		'user_id' =>$request['userId'],
    	]); 

    	return redirect('/users');
    }
}
