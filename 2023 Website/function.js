var pressed = 0;
var ActiveElement = document.ActiveElement;
var MyElement = document.getElementById("dropdown"); 
function menubutton(){
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
if (ActiveElement == MyElement)
{
   
    pressed = 1;
}
else{
    document.getElementById("dropdown").classList.remove("showDropdown");
    pressed = 0;
}

let thing = document.getElementById("thinggye");
thing.style.height = thing.style.width;

