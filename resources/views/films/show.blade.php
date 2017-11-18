@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-8 col-md-offset-2 text-left">

            <h1>{{ $film->name }}</h1>
            
            <p>Description: {{ $film->description }}</p>           
            <p>Release date: {{ $film->release_date }}</p>           
            <p>Rating: {{ $film->rating }}</p>           
            <p>Ticket price: {{ $film->ticket_price }}</p>           
            <p>Country: {{ $film->country }}</p>           
            <p>Genre: 
                 @foreach ($genres as $genre)
                    {{ $genre->name }} 
                 @endforeach            
            </p>           
            <p>Photo: </p>           
            <p> <img class="img-responsive" src="{{ $film->photo }}" ></p>

        </div>
    </div>

     
    <div class="row">
            <div class="col-sm-12">

                <h2>Comments</h2>
                 @forelse($comments as $comment)        
                           

                   <p>name: {{ $comment->name }} </p>
                   <p>{{ $comment->comment }} </p>
                    <hr >                       

                 @empty                      

                               <p>There are no comments</p>                
                       

                @endforelse
     </div>
    </div>
   

    @if(auth()->check())

     <div class="row">
        <div class="col-md-8 col-md-offset-2 text-left">
    
           <form action="/comments/{{ $film->slug }}" method="POST">

                {{ csrf_field() }}
       
                <div class="form-group">   

                     <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required placeholder="Name" />                 
                    
                     <textarea name="comment" id="comment" class="form-control" rows="5" required="required" placeholder="Wanna say something?">
                         {{ old('comment') }}
                     </textarea>
                    
                </div>

                <div class="form-group">                    
                    
                    <button type="submit" class="btn btn-primary">Publish</button>
                    
                </div>
               
           </form>

            @if (count($errors))
                <ul class="alert alert-danger">
                    @foreach ( $errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach                                    
                </ul>
            @endif

       </div>
    </div>
           

    @else

            <p class="text-center">Please <a href="{{ route('login') }}">login</a> to participate</p>

    @endif 
    


</div>
@endsection
