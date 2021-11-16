<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

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

        var form = document.getElementById('formShare');
        console.log(form);
        var btnShare = document.getElementById('share');

        btnShare.addEventListener('click',()=>{
            form.classList.toggle('hidden')
        })

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