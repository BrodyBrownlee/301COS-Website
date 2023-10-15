var pressed = 0;
function menubutton(){
    //code for the dropdown menu button
    if(pressed == 0)
    {
        document.getElementById("dropdown").classList.add("showDropdown");
        document.getElementById("dropdown").classList.remove("removeDropdown");
        pressed = 1;
    }
    else
    {
        document.getElementById("dropdown").classList.remove("showDropdown");
        document.getElementById("dropdown").classList.add("removeDropdown");
        pressed=0;
    }
}
