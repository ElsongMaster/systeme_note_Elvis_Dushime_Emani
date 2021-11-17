@extends('front.template.main')





@section('content')
    <h1 class="text-center">Pages principales</h1>



    <a href="{{route('notes.create')}}" class="btn btn-info">créer une note</a>

    <div class="container-fluid">
        <h2>Liste des notes</h2>
<div class="filter-content">
    <form action="{{route('notes.filter')}}" class="d-flex justify-content-end me-5" method="post">
        @csrf
        <label for="filter">Filtre par tag:</label>
        <input type="text" name="nom" onkeydown="(e)=>{e.key ==='enter'?e.target.parentNode.submit()}" placeholder="ex: php,java, ..etc">
        {{-- <button type="" class="btn btn-dark"></button> --}}

    </form>
</div>
        <div class="container">
            @include('back.partials.flash-message')
            @if(count($notes)>0)

                @foreach ($notes as $note )
    
                    <div class="card" style="width: 100%;">
                        <div class="auteur pt-3 ps-3">
                           <p><span class="text-decoration-underline">Auteur:</span> {{App\Models\User::find($note->auteurId)->name}}</p> 
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-center">{{$note->titre}}</h5>
                            <p  class="card-text text-center ckeditor">{{html_entity_decode($note->texte)}}</p>
                            <script>
                 
                            </script>
                            <div class="tagContent d-flex justify-content-evenly flex-wrap w-25 mx-auto">
                                @foreach ($note->tags as $tag )
                                    
                                <a href="#" class="card-link">#{{$tag->nom}}</a>
    
                                @endforeach
                            </div>
                            <div class="contentLike d-flex justify-content-evenly w-25 mx-auto pt-3">
        
                                <a href="{{Auth::check()?route('notes.like',$note->id):route('login')}}" id="like" class="btn btn-info "><i class="far fa-thumbs-up text-light pe-1"></i>+1</a>
                                <span id="cpt" class=" fs-4">{{$note->userslikeds->count()}}</span>
                                <a href="{{Auth::check()?route('notes.dislike',$note->id):route('login')}}" id="dislike" class="btn btn-info"><i class="far fa-thumbs-down text-light pe-1"></i>-1</a>
                                <span id="cpt" class=" fs-4 text-secondary">{{$note->usersdislikeds->count()}}</span>
                            </div>
                            <div class="d-flex justify-content-center mt-3 w-50 mx-auto">
    
                                <button  href="" class="btn btn-secondary w-25 share">Share</button>
                            </div>
                            <form  action="{{route('notes.share',$note->id)}}" method="post" class="formShare hidden">
                                @csrf
                                <div class="form-line d-flex mx-auto mt-2 " style="width: 30%">
                                    <label class="pt-2 pe-2" for="email">Email:</label><input placeholder="Entrer une adresse mail" type="text" name="email"><button type="submit" class="btn btn-primary ps-1">submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                @endforeach
            @else
                <p>Aucun résultat trouvé.</p>
            @endif
            

        </div>
    </div>
@endsection