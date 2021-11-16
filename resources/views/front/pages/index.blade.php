@extends('front.template.main')





@section('content')
    <h1 class="text-center">Pages principales</h1>



    <a href="{{route('notes.create')}}" class="btn btn-info">créer une note</a>

    <div class="container-fluid">
        <h2>Liste des notes</h2>
        <div class="container">
            @foreach ($notes as $note )
                <div class="card" style="width: 100%;">
                    <div class="card-body">
                        <h5 class="card-title text-center">{{$note->titre}}</h5>
                        <p class="card-text text-center">{{$note->texte}}</p>
                        <div class="tagContent d-flex justify-content-evenly flex-wrap w-25 mx-auto">
                            @foreach ($note->tags as $tag )
                                
                            <a href="#" class="card-link">#{{$tag->nom}}</a>

                            @endforeach
                        </div>
                        <div class="contentLike d-flex justify-content-evenly w-25 mx-auto pt-3">
    
                            <a href="{{Auth::check()?route('notes.like',$note->id):route('login')}}" id="like" class="btn btn-info "><i class="far fa-thumbs-up text-light pe-1"></i>+1</a>
                            <span id="cpt" class=" fs-4">{{$note->userslikeds->count()}}</span>
                            <a href="{{Auth::check()?route('notes.dislike',$note->id):route('login')}}" id="dislike" class="btn btn-info"><i class="far fa-thumbs-down text-light pe-1"></i>-1</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection