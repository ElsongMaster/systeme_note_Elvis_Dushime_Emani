



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">

    <link href="{{asset('vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
	<!-- Inclusion des feuilles de styles et script pour le composant Bootstrap-select -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

    <title>Document</title>
</head>
<body>
     <div class="container-fluid">

        <div class="container w-75  ">
        <x-app-layout >
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Dashboard') }}
                </h2>
            </x-slot>
            @include('back.partials.flash-message')
                <div class="container d-flex flex-column  mb-2 w-75">

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error )
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif


                <h1 class="text-center my-3"> Update Data Classe</h1>

                <form action="{{route('notes.store')}}" method="post"   enctype="multipart/form-data" >
                    @csrf





                <div class="mb-3">

                    <label for="tags" class="form-label">Tag(s)</label>

                    <select  id="mon-select"  class="selectpicker" multiple name="tags[]" id="tags" >
                        @foreach ($tags as $tag )


                            <option value="{{$tag->id}}" selected>{{$tag->nom}}</option>
                                


                        @endforeach

                    </select>
                </div>










                





                <div class="d-flex justify-content-center">

                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

                </form>

                </div>
            <script type="text/javascript">
                $(document).ready(function() {
                    $('#mon-select').selectpicker();
                });
            </script>
        </x-app-layout>
        @include("back.partials.navBar")
        </div>
    </div>



    <style>
        .hidden-select{
            display:none;
        }
    </style>

   {{-- <script src="{{asset('js/app.js')}}"></script> --}}
   <script src="{{asset('js/tailwind.js')}}"></script>
</body>
</html>



