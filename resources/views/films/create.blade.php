@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Create Film</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            
               
                    <form action="/films" method="POST" role="form" class="form-horizontal" enctype="multipart/form-data">  

                    {{ csrf_field() }}    

                        <div class="form-group">
                            <label class="col-sm-2" for="">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>    
                            </div>
                            
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2">Description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="description" name="description" rows="8" required>{{ old('description') }}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2" for="">Release date</label>
                            <div class="col-sm-10">
                                <input type="text" class="datepicker form-control" id="release_date" name="release_date" value="{{ old('release_date') }}"     required>
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="col-sm-2" for="">Rating</label>
                            <div class="col-sm-10">
                                <select name="rating" id="rating" class="form-control" required>
                                    <option value="1">1</option>
                                    <option value="1">2</option>
                                    <option value="1">3</option>
                                    <option value="1">4</option>
                                    <option value="1">5</option>
                                </select>
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="col-sm-2">Ticket price</label>
                             <div class="col-sm-10">
                                <input type="number" class="form-control" id="ticket_price" name="ticket_price" value="{{ old('ticket_price') }}" required>
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="col-sm-2" for="">Country</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="country" name="country" value="{{ old('country') }}" required>
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="col-sm-2" for="">Genre</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="genre" name="genre[]" required multiple="">

                                    @foreach($genres as $genre)
                                        <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                                    @endforeach                                    

                                </select>
                                (*) Press control + click to select multiple genders
                            </div>

                        </div> 

                        <div class="form-group">
                            <label class="col-sm-2" for="">Photo</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" id="photo" name="photo" required />
                            </div>
                        </div> 
                        
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                              <button type="submit" class="btn btn-default">Create</button>
                            </div>
                          </div>
                    
                        @if (count($errors))
                            <ul class="alert alert-danger">
                                @foreach ( $errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach                                    
                            </ul>
                        @endif
                        


                    </form>
               
        

            </div>
        </div>
</div>
@endsection

@section('scripts')    

  <script>
    $( function() {
        $( ".datepicker" ).datepicker({
            dateFormat: "yy-mm-dd"
        });  
    });     
  </script>

@endsection
