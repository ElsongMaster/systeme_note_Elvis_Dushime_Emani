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

        var Tabform = document.querySelectorAll('.formShare');
        var TabBtnShare = Array.from(document.querySelectorAll('.share'));
        // var classNameForm;
        // var classNameBtn;
        console.log(TabBtnShare)
        for(var i=0;i<Tabform.length;i++){
            // classNameForm = 'formShare'+i;
            // classNameBtn = 'share'+i;
            // Tabform[i].classList.add(classNameForm);
            // TabBtnShare[i].classList.add(classNameBtn);
            console.log(Tabform[i])
            TabBtnShare[i].addEventListener('click',(e)=>{

                
                Tabform[TabBtnShare.indexOf(e.target)].classList.toggle('hidden')
            })
            
        }

        // btnShare.addEventListener('click',()=>{
        //     form.classList.toggle('hidden')
        // })
        // console.log(document.querySelectorAll('.ckeditor'))
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