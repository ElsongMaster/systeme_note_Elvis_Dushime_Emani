@extends('front.template.main')





@section('content')
    <h1 class="text-center">Pages des notes persos</h1>



    <div class="container-fluid">
        <h2>Liste des notes</h2>
        {{-- <div class="container">
            @include('back.partials.flash-message')
            @foreach ($notes as $note )
            @can('auteur_note', $note->auteurId)
                <div class="card mx-auto" style="width: 75%;">
                    <div class="auteur pt-3 ps-3">
                    <p><span class="text-decoration-underline">Auteur:</span> {{App\Models\User::find($note->auteurId)->name}}</p> 
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-center">{{$note->titre}}</h5>
                        <p class="card-text text-center ckeditor">{{html_entity_decode($note->texte)}}</p>
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
                        <form action="{{route('notes.share',$note->id)}}" method="post" class=" formShare hidden">
                            @csrf
                            <div class="form-line d-flex mx-auto mt-2 " style="width: 30%">
                                <label class="pt-2 pe-2" for="email">Email:</label><input placeholder="Entrer une adresse mail" type="text" name="email"><button type="submit" class="btn btn-primary ps-1">submit</button>
                            </div>
                        </form>
                            <div class="d-flex justify-content-center">
                            
                              <a href="{{route('notes.edit',$note->id)}}" class="btn btn-warning my-2 mr-2"><i class="fas fa-edit"></i></a>
                            </div>  

                    </div>
                </div>
            @endcan
            @endforeach
            <div class="container d-flex justify-content-center">
            
                <a href="{{route('notes.create')}}" class="btn btn-success p-4  my-3 rounded mx-auto"><i class="fas fa-plus text-secondary fs-2"></i></a>
            </div>
        </div> --}}
        <div class="container-fluid">
            @include('back.partials.flash-message')

                <div class="wrapper">
                    <div class="cols">
                        @foreach ($notes as $note )
                     @can('auteur_note', $note->auteurId)
                        <div class="col" ontouchstart="this.classList.toggle('hover');">
                            <div class="container-card">
                            <div class="front" style="background-image: url(https://unsplash.it/50{{$note->id}}/50{{$note->id}}/)">
                                <div class="inner">
                                    <p>{{$note->titre}}</p>
                                    <span>Auteur:</span> {{App\Models\User::find($note->auteurId)->name}}</span>
                                    <div class="content_tags">
                                        @foreach ($note->tags as $tag )
                                            <span class="tag rounded-full py-3 px-6..">#{{$tag->nom}}</span>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="back">
                                <div class="inner">
                                    @if ($note->shared)
                                        
                                    <div class="content-shared d-flex mt-3">
                                        
                                    <p class="w-50 text-start"> partagé:<i class="fas fa-check-circle text-success fs-3"></i>
                                    </p>

                                    </div>                            
                                    @endif
                                    <p class="ckeditor">{{html_entity_decode($note->texte)}}</p>
                                    <div class="contentLike d-flex justify-content-evenly w-50 mx-auto pt-3" style="z-index: 3;">
                                        <div class="btnLike d-flex">

                                            <a href="{{Auth::check()?route('notes.like',$note->id):route('login')}}" id="like" class="btn btn-info "><i class="far fa-thumbs-up text-light pe-1"></i>+1</a>
                                            <span id="cpt" class=" fs-4 d-flex justify-content-center align-items-center ms-1"> {{$note->userslikeds->count()}}</span>
                                        </div>

                                        <div class="btnUnLike d-flex">

                                            <a href="{{Auth::check()?route('notes.dislike',$note->id):route('login')}}" id="dislike" class="btn btn-info"><i class="far fa-thumbs-down text-light pe-1"></i>-1</a>
                                            <span id="cpt" class=" fs-4 text-secondary text-center d-flex justify-content-center align-items-center ms-1"> {{$note->usersdislikeds->count()}}</span>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center mt-3 w-50 mx-auto">

                                        <button  href="" class="btn btn-secondary share">Share</button>
                                    </div>
                                    <form  action="{{route('notes.share',$note->id)}}" method="post" class="formShare hidden">
                                        @csrf
                                        <div class="form-line d-flex  mt-2 " style="width: 70%">
                                            <label class="pt-2 pe-2" for="email">Email:</label><input placeholder="Entrer une adresse mail" type="text" name="email"><button type="submit" class="btn btn-primary ps-1">submit</button>
                                        </div>
                                    </form>
                                    <div class="d-flex justify-content-center">

                                        <a href="{{route('notes.edit',$note->id)}}" class="btn btn-warning my-2 mr-2"><i class="fas fa-edit"></i></a>
                                    </div>
                                    <a href="{{route('notes.show',$note->id)}}" class="text-dark text-decoration-underline">more details</a>

                                </div>
                            </div>
                            </div>
                        </div>
                    @endcan
                        @endforeach
                        </div>
                    </div>

                </div>
                <div class="container d-flex justify-content-center">
                
                    <a href="{{route('notes.create')}}" class="btn btn-success p-4  my-3 rounded mx-auto"><i class="fas fa-plus text-secondary fs-2"></i></a>
                </div>
    </div>
@endsection