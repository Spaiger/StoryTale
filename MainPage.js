function menu(){
    document.getElementById("conn").style.display = "none";
    document.getElementById("mb").style.display = "none";
    document.getElementById("butmenu").style.display = "block";
}

function clo(){
    document.getElementById("butmenu").style.display = "none";
    document.getElementById("conn").style.display = "flex";
    document.getElementById("mb").style.display = "none";
}

// function chan(){
//     const med = window.matchMedia('screen and (max-width:900px)');
//     if (!med.matches){
//         document.getElementById("mb").style.display = "none";
//     }
// }