
window.addEventListener('wheel', function (event) {
    if (event.deltaY < 0) {
        document.getElementById('navbar').style.top = "0px";
    }
    else if (event.deltaY > 0) {
        document.getElementById('navbar').style.top = "-75px";
    }
});
function show_menu() {
    document.getElementById('navbar').style.top = "0px";
}
function op_zamknij() {
    document.getElementById("opinie").style.visibility = "hidden";
    document.getElementById("opinie").style.opacity = "0";
}
function op_otworz() {
    document.getElementById("opinie").style.visibility = "visible";
    document.getElementById("opinie").style.opacity = "1";
}
