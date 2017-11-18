@extends('layouts.app')

@section('content')
<div class="container">

	 @if(auth()->check())
		 <div class="row">
	        <div class="col-md-8 col-md-offset-2">                        
	  
				<a class="btn btn-primary" href="films/create" role="button">Create new film</a>
	            
	        </div>    
	    </div>

	    <hr>
     @endif

    <div class="row">
        <div class="col-md-8 col-md-offset-2">

        	<h1>Films</h1>
             

            @foreach($films as $film)

                <div class="film">

                	<p><a href="/films/{{ $film->slug }}">{{ $film->name }}</a></p>
                </div>

            @endforeach 

            {{ $films->links() }}            

  

            
        </div>
    



    </div>


     
        

</div>
@endsection
