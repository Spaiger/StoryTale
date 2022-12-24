function read(){
    document.getElementById("left").style.display = "none";
    document.getElementById("edit1").style.display = "none";
    document.getElementById("right").style.display = "none";
    document.getElementById("title").style.display = "flex";
    document.getElementById("story").style.display = "block";
    document.getElementById("mda").style.flexDirection = "column";
}

function back(){
    document.getElementById("title").style.display = "none";
    document.getElementById("story").style.display = "none";
    document.getElementById("left").style.display = "block";
    document.getElementById("right").style.display = "block";
    document.getElementById("edit1").style.display = "block";
    document.getElementById("mda").style.flexDirection = "row";
}