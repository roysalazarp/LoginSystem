 
 
let toggleNavbarOpen = false;

let toggleNavbar = function() {
    let getdropDownMenu = document.querySelector(".dropDownMenu");
    let getdropDownMenuUl = document.querySelector(".dropDownMenu ul");
    let getdropDownMenuA = document.querySelectorAll(".dropDownMenu a");

    if (toggleNavbarOpen === false){
        getdropDownMenuUl.style.visibility = "visible";
        getdropDownMenu.style.width = "100%";

        let arrayLength = getdropDownMenuA.length;
        for (let i=0; i < arrayLength; i++) {
            getdropDownMenuA[i].style.opacity = "1";
        }

        toggleNavbarOpen = true;
    }

    else if (toggleNavbarOpen === true){
        getdropDownMenu.style.width = "0px";

        let arrayLength = getdropDownMenuA.length;
        for (let i=0; i < arrayLength; i++) {
            getdropDownMenuA[i].style.opacity = "0";
        }
        
        getdropDownMenuUl.style.visibility = "hidden";

        toggleNavbarOpen = false;
    }
}