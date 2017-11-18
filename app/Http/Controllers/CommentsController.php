<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Film;

class CommentsController extends Controller
{
    
	public function __construct(){
		$this->middleware('auth');
	}
	
    public function store(Film $film){


        $this->validate(request(), [
            'name' => 'required',
            'comment' => 'required'
        ]);

        //registered user can insert any name as required
    	$film->addComment([
    		'name'=> request('name'), 
    		'comment'=> request('comment'), 
    		'user_id'=> auth()->id()
    	]);

    	return back();
    }
}
