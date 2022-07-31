var modal
var btn
var span


$(document).ready(function() {
    // Get the modal
        modal = document.getElementById("myModal");

        // Get the button that opens the modal
        btn = document.getElementsByClassName("modallink")[0];

        // Get the <span> element that closes the modal
        span = document.getElementsByClassName("mClose")[0];

        // When the user clicks on the button, open the modal
        btn.onclick = function(e) {
        e.preventDefault();
        modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
        modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
        }

});
    

