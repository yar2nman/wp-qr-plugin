var mbuttons =[];

$(document).ready(function() {
    
    // Get mbuttons list
    mbuttons = document.getElementsByClassName("sbutton");
    console.log(mbuttons);


    if (mbuttons.length > 0) {
        for (var i = 0; i < mbuttons.length; i++) {
            mbuttons[i].addEventListener("click", function() {
               console.log(this.id);
               setrating(this.id);

            });
        }
        
    }
    
});

setrating = function(id) {
    for (var i = 0; i < mbuttons.length; i++) {
        if (+id >= +mbuttons[i].id) {
            mbuttons[i].style.color = "white";
            mbuttons[i].style.background = "blue";
        }else {
            mbuttons[i].style.color = "red";
            mbuttons[i].style.background = "yellow";
        }
        
    }
}