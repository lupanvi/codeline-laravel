<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Film;
use App\Genre;

class FilmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $films = Film::paginate(1);

        return view('films.index', [
                    'films' => $films

                ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $genres = Genre::all();

        return view('films.create', [
            'genres'=>$genres
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'release_date' => 'required|date',
            'rating' => 'required|between:1,5',
            'ticket_price' => 'required|numeric',
            'country' => 'required',
            'genre' => 'required',
            'photo' => 'required'
        ]);
        
        $name = $request->input('name');


        
        
        $file_name = '';
        if ($request->hasFile('photo')) {

            $file_name = $request->file('photo')->hashName(); 
            $request->file('photo')->move(public_path('/images'), $file_name);            
            $file_name = asset('/images/'. $file_name);
                                  
        }

        $thread = Film::create([
                'name' => $name,
                'slug' => str_slug($name),
                'description' => $request->input('description'),
                'release_date' => $request->input('release_date'),
                'rating' => $request->input('rating'),
                'ticket_price' => $request->input('ticket_price'),
                'country' => $request->input('country'),
                'photo' => $file_name
            ])->genres()->attach(
                $request->input('genre')
            );

        

        return redirect('/films');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Film $film)
    {
        $comments = $film->comments()->get();
        $genres = $film->genres()->get();


        return view('films.show', [
                                'film' => $film, 
                                'comments' => $comments,
                                'genres' => $genres
                            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
