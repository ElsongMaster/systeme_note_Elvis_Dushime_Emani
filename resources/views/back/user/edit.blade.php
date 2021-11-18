@extends('front.template.main')




@section('content')

<div class="container-fluid d-flex justify-content-center align-items-center">

    <div class="card m-3" style="width: 18rem;">
    <img src="{{asset('img/'.$user->image)}}" class="card-img-top" alt="...">
            @if (Storage::disk('public')->exists('img/'.$user->image))
            
                <img src="{{asset('img/'.$user->image)}}" class="card-img-top" alt="...">
            @else
                <img src="{{$user->image}}" class="card-img-top" alt="...">
            
            @endif
            <div class="card-body">
              <h5 class="card-title">Nom: <span class="text-info">{{$user->name}}</span></h5>
              <h5 class="card-title">Email: <span class="text-info">{{$user->email}}</span></h5>
              <p class="card-text">Role: <span class="text-info">{{$user->span}}</span></p>
              <p class="card-text">Texte: <span class="text-info">{{$user->texte}}</span></p>
            <form action="{{route('users.destroy', $user->id)}}" method="POST" class="d-flex justify-content-center">
                @method('DELETE')
                @csrf
                    <a href="{{route('users.edit',$user->id)}}" class="btn btn-warning my-2 mr-2">EDIT</a>
                    <button type="button" class="btn btn-danger my-2">DELETE</button>
              </form>
    
            </div>
      </div> 
</div>
    
@endsection