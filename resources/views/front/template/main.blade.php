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

    {{-- <script>
        var btnLike = document.getElementById('like');
        var btnDislike = document.getElementById('dislike');
        function like(){
            var spanCpt = document.getElementById('cpt');
            spanCpt.innerText = spanCpt.innerText + 1;
        }
    </script> --}}
</body>
</html>