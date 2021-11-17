<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title></title>
        <meta content="" name="description">
        <meta content="" name="keywords">

    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

         <link href="{{asset('vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
	<!-- Inclusion des feuilles de styles et script pour le composant Bootstrap-select -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="{{asset('css/tailwind.css')}}">

      </head>

<body class="position-relative  min-vh-100 h-100 pb-5">
     <div class="container-fluid ">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error )
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="container w-75  ">
        <x-app-layout>
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Dashboard') }}
                </h2>
            </x-slot>

            @yield("backContent")
        </x-app-layout>
        @include("back.partials.navBar")
        </div>
    </div>
        {{-- @include("back.partials.footer") --}}


   <script src="{{asset('js/app.js')}}"></script>
   <script src="{{asset('js/tailwind.js')}}"></script>

<script type="text/javascript">
    var tabBtnCloses = Array.from(document.getElementsByClassName("close"));
        console.log(tabBtnCloses);
    tabBtnCloses.forEach((elt) => {
        elt.addEventListener("click", () => {
            elt.parentNode.classList.add(".hidden-elt");
        });
    });

       if(document.querySelectorAll('.ckeditor') != undefined) {
           var stringToHTML = function (str) {
                var parser = new DOMParser();
                var doc = parser.parseFromString(str, 'text/html');
                return doc.body;
            };
            var Tabnode = Array.from(document.getElementsByClassName('ckeditor'));
            Tabnode.forEach(pnode =>{

                var node = stringToHTML(pnode.textContent);
    
                pnode.innerHTML = node.innerHTML;
            })
 

        }  

</script>


    <style>
        #formShare{
            transition: 0.5s;
        }

        .hidden-elt{
            display:none;
        }
    </style>
</body>
</html>
