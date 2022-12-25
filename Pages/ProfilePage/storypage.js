const windowInnerWidth = document.documentElement.clientWidth

function read(){
    document.getElementById("left").style.display = "none";
    document.getElementById("edit1").style.display = "none";
    document.getElementById("right").style.display = "none";
    document.getElementById("title").style.display = "flex";
    document.getElementById("story").style.display = "block";
    document.getElementById("mda").style.flexDirection = "column";
    document.getElementById("ns").style.display = "none";
    document.getElementById("bu").style.display = "flex";
    document.getElementById("Name").style.display = "flex";
}

function back(){
    document.getElementById("title").style.display = "none";
    document.getElementById("story").style.display = "none";
    if (windowInnerWidth < 900){
        document.getElementById("left").style.display = "flex";
        document.getElementById("right").style.display = "flex";
    }else{
        document.getElementById("left").style.display = "block";
        document.getElementById("right").style.display = "block";
    }
    document.getElementById("edit1").style.display = "block";
    document.getElementById("mda").style.flexDirection = "row";
    document.getElementById("ns").style.display = "flex";
    document.getElementById("bu").style.display = "none";
    document.getElementById("Name").style.display = "none";
}

function delet(){
    document.getElementById("back").style.display = "flex";
}

function retur(){
    document.getElementById("back").style.display = "none";
}

function menu(){
    document.getElementById("conn").style.display = "none";
    document.getElementById("mb").style.display = "none";
    document.getElementById("butmenu").style.display = "block";
}

function clo(){
    document.getElementById("butmenu").style.display = "none";
    document.getElementById("conn").style.display = "flex";
    document.getElementById("mb").style.display = "flex";
}