require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// js pour la nav backend
    let sidebar = document.querySelector(".sidebar");
    let closeBtn = document.querySelector("#btn");
    let searchBtn = document.querySelector(".bx-search");

    closeBtn.addEventListener("click", () => {
        sidebar.classList.toggle("open");
        menuBtnChange(); //calling the function(optional)
    });

    searchBtn.addEventListener("click", () => {
        // Sidebar open when you click on the search iocn
        sidebar.classList.toggle("open");
        menuBtnChange(); //calling the function(optional)
    });

    // following are the code to change sidebar button(optional)
    function menuBtnChange() {
        if (sidebar.classList.contains("open")) {
            closeBtn.classList.replace("bx-menu", "bx-menu-alt-right"); //replacing the iocns class
        } else {
            closeBtn.classList.replace("bx-menu-alt-right", "bx-menu"); //replacing the iocns class
        }
    }

    
// close flash msg


var tabBtnCloses = Array.from(document.getElementsByClassName("close"));
console.log(tabBtnCloses);
tabBtnCloses.forEach((elt) => {
    elt.addEventListener("click", () => {
        elt.parentNode.classList.add("hidden");
    });
});


// affichage des formulaure share

var Tabform = document.querySelectorAll(".formShare");
var TabBtnShare = Array.from(document.querySelectorAll(".share"));

console.log(TabBtnShare);
for (var i = 0; i < Tabform.length; i++) {
    console.log(Tabform[i]);
    TabBtnShare[i].addEventListener("click", (e) => {
        Tabform[TabBtnShare.indexOf(e.target)].classList.toggle(
            "hidden"
        );
    });
}

//Affichage texte bon format

if (document.querySelectorAll(".ckeditor") != undefined) {
    var stringToHTML = function (str) {
        var parser = new DOMParser();
        var doc = parser.parseFromString(str, "text/html");
        return doc.body;
    };
    var Tabnode = Array.from(
        document.getElementsByClassName("ckeditor")
    );
    Tabnode.forEach((pnode) => {
        var node = stringToHTML(pnode.textContent);

        pnode.innerHTML = node.innerHTML;
    });
} 

