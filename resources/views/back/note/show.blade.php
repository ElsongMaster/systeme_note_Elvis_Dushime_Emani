{{-- <!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Tailwind CSS -->
  <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">


  <title>Tailwind CSS CDN</title>
</head>
<body>


  <div class="p-10">
    <!--Card 1-->
    <div class=" w-full lg:max-w-full lg:flex">
      <div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden" style="background-image: url('https://www.bmc-switzerland.com/media/catalog/category/BMC_Parent_Category_Header_Image_Mountain_All_Mountain_1.jpg')" title="Mountain">
      </div>
      <div class="border-r border-b border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
        <div class="mb-8">
          <p class="text-sm text-gray-600 flex items-center">
            <svg class="fill-current text-gray-500 w-3 h-3 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
              <path d="M4 8V6a6 6 0 1 1 12 0v2h1a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-8c0-1.1.9-2 2-2h1zm5 6.73V17h2v-2.27a2 2 0 1 0-2 0zM7 6v2h6V6a3 3 0 0 0-6 0z" />
            </svg>
            Members only
          </p>
          <div class="text-gray-900 font-bold text-xl mb-2">Best Mountain Trails 2020</div>
          <p class="text-gray-700 text-base">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, Nonea! Maiores et perferendis eaque, exercitationem praesentium nihil.</p>
        </div>
        <div class="flex items-center">
          <img class="w-10 h-10 rounded-full mr-4" src="http://www.jobboom.com/carriere/wp-content/uploads/2016/03/photo_profil.jpg" alt="Avatar of Writer">
          <div class="text-sm">
            <p class="text-gray-900 leading-none">John Smith</p>
            <p class="text-gray-600">Aug 18</p>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>
</html> --}}

@extends('front.template.main')




@section('content')
    <div class="container-fluid">
        <h1 class="text-decoration-underline">Détails de la note</h1>
        <div class="wrapper">
        <div class="cols">
            <div class="col" ontouchstart="this.classList.toggle('hover');">
                <div class="container">
                <div class="front" style="background-image: url(https://unsplash.it/500/500/)">
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
                        @if ($editeur != null)
                            
                            <p class="text-end w-50"><span class="text-decoration-underline">Editeur:</span>{{$editeur->name}} </p>
                        @endif
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
                    </div>
                </div>
                </div>
            </div>
            {{-- <div class="col" ontouchstart="this.classList.toggle('hover');">
                <div class="container">
                <div class="front" style="url(https://unsplash.it/511/511/)">
                    <div class="inner">
                    <p>Rocogged</p>
                    <span>Lorem ipsum</span>
                    </div>
                </div>
                <div class="back">
                    <div class="inner">
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Alias cum repellat velit quae suscipit c.</p>
                    </div>
                </div>
                </div>
            </div>
            <div class="col" ontouchstart="this.classList.toggle('hover');">
                <div class="container">
                <div class="front" style="background-image: url(https://unsplash.it/502/502/)">
                    <div class="inner">
                    <p>Strizzes</p>
                    <span>Lorem ipsum</span>
                    </div>
                </div>
                <div class="back">
                    <div class="inner">
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Alias cum repellat velit quae suscipit c.</p>
                    </div>
                </div>
                </div>
            </div>
            <div class="col" ontouchstart="this.classList.toggle('hover');">
                <div class="container">
                <div class="front" style="background-image: url(https://unsplash.it/503/503/)">
                    <div class="inner">
                    <p>Clossyo</p>
                    <span>Lorem ipsum</span>
                    </div>
                </div>
                <div class="back">
                    <div class="inner">
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Alias cum repellat velit quae suscipit c.</p>
                    </div>
                </div>
                </div>
            </div>
            <div class="col" ontouchstart="this.classList.toggle('hover');">
                <div class="container">
                <div class="front" style="background-image: url(https://unsplash.it/504/504/">
                    <div class="inner">
                    <p>Rendann</p>
                    <span>Lorem ipsum</span>
                    </div>
                </div>
                <div class="back">
                    <div class="inner">
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Alias cum repellat velit quae suscipit c.</p>
                    </div>
                </div>
                </div>
            </div>
            <div class="col" ontouchstart="this.classList.toggle('hover');">
                <div class="container">
                <div class="front" style="background-image: url(https://unsplash.it/505/505/)">
                    <div class="inner">
                    <p>Reflupper</p>
                    <span>Lorem ipsum</span>
                    </div>
                </div>
                <div class="back">
                    <div class="inner">
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Alias cum repellat velit quae suscipit c.</p>
                    </div>
                </div>
                </div>
            </div>
            <div class="col" ontouchstart="this.classList.toggle('hover');">
                <div class="container">
                <div class="front" style="background-image: url(https://unsplash.it/506/506/)">
                    <div class="inner">
                    <p>Acirassi</p>
                    <span>Lorem ipsum</span>
                    </div>
                </div>
                <div class="back">
                    <div class="inner">
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Alias cum repellat velit quae suscipit c.</p>
                    </div>
                </div>
                </div>
            </div>
            <div class="col" ontouchstart="this.classList.toggle('hover');">
                <div class="container">
                <div class="front" style="background-image: url(https://unsplash.it/508/508/)">
                    <div class="inner">
                    <p>Sohanidd</p>
                    <span>Lorem ipsum</span>
                    </div>
                </div>
                <div class="back">
                    <div class="inner">
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Alias cum repellat velit quae suscipit c.</p>
                   
                    </div>
                </div>
                </div>
            </div> --}}
            </div>
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
                justify-content: center;
        width: 100%;
        margin: auto;
        
        }

        .col{
        flex-basis: 300px !important;
        width: 30%!important;
        margin: 1rem;
        cursor: pointer;
        }

        .container{
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
        .container:hover .front,
        .container:hover .back{
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

        .container .back{
            -webkit-transform: rotateY(180deg);
                    transform: rotateY(180deg);
            -webkit-transform-style: preserve-3d;
                    transform-style: preserve-3d;
        }

        .container .front{
            -webkit-transform: rotateY(0deg);
                    transform: rotateY(0deg);
            -webkit-transform-style: preserve-3d;
                    transform-style: preserve-3d;
        }

        .container:hover .back{
        -webkit-transform: rotateY(0deg);
                transform: rotateY(0deg);
        -webkit-transform-style: preserve-3d;
                transform-style: preserve-3d;
        }

        .container:hover .front{
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
        font-size: 2rem;
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