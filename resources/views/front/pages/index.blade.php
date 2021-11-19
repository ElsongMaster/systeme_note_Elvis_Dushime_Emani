@extends('front.template.main')





@section('content')
    
    <h1 class="text-center">Pages principales</h1>

    
    {{-- {{dd(session('windowW'))}} --}}

    <div class="container-fluid">
        <h2>Liste des notes</h2>
    @can('user_connected')
        
        <div class="filter-content">
            <form action="{{route('notes.filter')}}" class="d-flex justify-content-end me-5" method="post">
                @csrf
                <label for="filter">Filtre par tag:</label>
                <input type="text" name="nom" onkeydown="(e)=>{e.key ==='enter'?e.target.parentNode.submit()}" placeholder="ex: PHP,JAVA, ..etc">

            </form>
        </div>
    @endcan
        <div class="container">
            @include('back.partials.flash-message')
            @if(session('notes') !=null && count(session('notes'))>0 )
{{-- 
                @foreach (session('notes') as $note )
    
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
                @endforeach --}}
                    <div class="container-fluid">
                        <div class="wrapper">
                        <div class="cols">
                            @foreach (session('notes') as $note )
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

                                        <a href="{{route('notes.show',$note->id)}}" class="text-dark text-decoration-underline">more details</a>
                                    </div>

                                </div>
                                </div>
                            </div>
                            @endforeach
                            </div>
                        </div>

                    </div>
            @elseif (session('notes') !=null && count(session('notes'))==0 )
                <p>Aucun résultat trouvé.</p>
            @else
                
{{--     
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
                            @can('user_connected')

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
                            @endcan
                        </div>
                    </div> --}}
                
                <div class="container-fluid">
                        <div class="wrapper">
                        <div class="cols">
                            @foreach ($notes as $note )
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
                                        @can('user_connected')
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
                                         @endcan
                                         <a href="{{route('notes.show',$note->id)}}" class="text-dark text-decoration-underline">more details</a>
                                    </div>
                                </div>
                                </div>
                            </div>
                            @endforeach
                            </div>
                        </div>

                    </div>
                      
            @endif
            

        </div>
    </div>
<style>
        *{
        margin: 0;
        padding: 0;
        -webkit-box-sizing: border-box;
                box-sizing: border-box;
        }

        h1{
        font-size: 2rem;
        font-family: 'Montserrat';
        font-weight: normal;
        color: #444;
        text-align: center;
        margin: 2rem 0;
        }

        .wrapper{
        width: 90%;
        margin: 0 auto;
        max-width: 80rem;
        }

        .cols{
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
            flex-wrap: wrap;
        -webkit-box-pack: center;
            -ms-flex-pack: center;
                justify-content: space-evenly;
        width: 100%;
        margin: auto;
        
        }

        .col{
        flex-basis: 300px !important;
        width: 35% !important;
        max-width: 300px;
        margin: 1rem;
        cursor: pointer;
        }

        .container-card{
        -webkit-transform-style: preserve-3d;
                transform-style: preserve-3d;
        -webkit-perspective: 1000px;
                perspective: 1000px;
        }

        .front,
        .back{
        background-size: cover;
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.25);
        border-radius: 10px;
        background-position: center;
        -webkit-transition: -webkit-transform .7s cubic-bezier(0.4, 0.2, 0.2, 1);
        transition: -webkit-transform .7s cubic-bezier(0.4, 0.2, 0.2, 1);
        -o-transition: transform .7s cubic-bezier(0.4, 0.2, 0.2, 1);
        transition: transform .7s cubic-bezier(0.4, 0.2, 0.2, 1);
        transition: transform .7s cubic-bezier(0.4, 0.2, 0.2, 1), -webkit-transform .7s cubic-bezier(0.4, 0.2, 0.2, 1);
        -webkit-backface-visibility: hidden;
                backface-visibility: hidden;
        text-align: center;
        min-height: 280px;
        height: auto;
        border-radius: 10px;
        color: #fff;
        font-size: 1rem;
        }

        .back{
        background: #cedce7;
        background: -webkit-linear-gradient(45deg,  #cedce7 0%,#596a72 100%);
        background: -o-linear-gradient(45deg,  #cedce7 0%,#596a72 100%);
        background: linear-gradient(45deg,  #cedce7 0%,#596a72 100%);
        }

        .front:after{
        position: absolute;
            top: 0;
            left: 0;
            z-index: 1;
            width: 100%;
            height: 100%;
            content: '';
            display: block;
            opacity: .6;
            background-color: #000;
            -webkit-backface-visibility: hidden;
                    backface-visibility: hidden;
            border-radius: 10px;
        }
        .container-card:hover .front,
        .container-card:hover .back{
            -webkit-transition: -webkit-transform .7s cubic-bezier(0.4, 0.2, 0.2, 1);
            transition: -webkit-transform .7s cubic-bezier(0.4, 0.2, 0.2, 1);
            -o-transition: transform .7s cubic-bezier(0.4, 0.2, 0.2, 1);
            transition: transform .7s cubic-bezier(0.4, 0.2, 0.2, 1);
            transition: transform .7s cubic-bezier(0.4, 0.2, 0.2, 1), -webkit-transform .7s cubic-bezier(0.4, 0.2, 0.2, 1);
        }

        .back{
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
        }

        .inner{
            -webkit-transform: translateY(-50%) translateZ(60px) scale(0.94);
                    transform: translateY(-50%) translateZ(60px) scale(0.94);
            top: 50%;
            position: absolute;
            left: 0;
            width: 100%;
            padding: 2rem;
            -webkit-box-sizing: border-box;
                    box-sizing: border-box;
            outline: 1px solid transparent;
            -webkit-perspective: inherit;
                    perspective: inherit;
            z-index: 2;
        }

        .container-card .back{
            -webkit-transform: rotateY(180deg);
                    transform: rotateY(180deg);
            -webkit-transform-style: preserve-3d;
                    transform-style: preserve-3d;
        }

        .container-card .front{
            -webkit-transform: rotateY(0deg);
                    transform: rotateY(0deg);
            -webkit-transform-style: preserve-3d;
                    transform-style: preserve-3d;
        }

        .container-card:hover .back{
        -webkit-transform: rotateY(0deg);
                transform: rotateY(0deg);
        -webkit-transform-style: preserve-3d;
                transform-style: preserve-3d;
        }

        .container-card:hover .front{
        -webkit-transform: rotateY(-180deg);
                transform: rotateY(-180deg);
        -webkit-transform-style: preserve-3d;
                transform-style: preserve-3d;
        }

        .front .content_tags{
            display: flex;
            justify-content: space-evenly;
            flex-wrap: wrap;
            margin-top: 10px;
            width: 100%;
        }
        .front .content_tags .tag{
            margin: 0 auto;
            flex-basis: 100px;
            width: 100px;
            border-radius: 50%;
            background-color: rgb(199, 199, 199);
            color: #444;
        }



        .front .inner p{
        font-size: 1.5rem;
        margin-bottom: 2rem;
        position: relative;
        }

        .front .inner p:after{
        content: '';
        width: 4rem;
        height: 2px;
        position: absolute;
        background: #C6D4DF;
        display: block;
        left: 0;
        right: 0;
        margin: 0 auto;
        bottom: -.75rem;
        }

        .front .inner span{
        color: rgba(255,255,255,0.7);
        font-family: 'Montserrat';
        font-weight: 300;
        }

        @media screen and (max-width: 64rem){
        .col{
            width: calc(33.333333% - 2rem);
        }
        }

        @media screen and (max-width: 48rem){
        .col{
            width: calc(50% - 2rem);
        }
        }

        @media screen and (max-width: 32rem){
        .col{
            width: 100%;
            margin: 0 0 2rem 0;
        }
        }
</style>
@endsection