{{-- <x-window-size::save-to-session />     --}}

<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.0/css/v4-shims.min.css" integrity="sha512-p++g4gkFY8DBqLItjIfuKJPFvTPqcg2FzOns2BNaltwoCOrXMqRIOqgWqWEvuqsj/3aVdgoEo2Y7X6SomTfUPA==" crossorigin="anonymous" referrerpolicy="no-referrer" />    
    {{-- multiselect  --}}
    <link rel="stylesheet" href="{{asset('css/tailwind.css')}}">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
	<!-- Inclusion des feuilles de styles et script pour le composant Bootstrap-select -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
    <title>Document</title>

</head>
<body>
    
    @include('front.partials.navBar')
    @yield('content')



    <script src="{{asset('js/app.js')}}"></script>

    <script>
        var tabBtnCloses = Array.from(document.getElementsByClassName("close"));
            console.log(tabBtnCloses);
        tabBtnCloses.forEach((elt) => {
            elt.addEventListener("click", () => {
                elt.parentNode.classList.add("hidden");
            });
        });

        var Tabform = document.querySelectorAll('.formShare');
        var TabBtnShare = Array.from(document.querySelectorAll('.share'));

        console.log(TabBtnShare)
        for(var i=0;i<Tabform.length;i++){

            console.log(Tabform[i])
            TabBtnShare[i].addEventListener('click',(e)=>{

                
                Tabform[TabBtnShare.indexOf(e.target)].classList.toggle('hidden')
            })
            
        }


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
            transition: 0.2s;
        }

        .hidden{
            display:none;
        }
    </style>
</body>
</html>