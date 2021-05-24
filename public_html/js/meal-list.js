$(document).ready(function() {



    // search bar qol ----------------------------------------------------
    $("#searchBar").on("keyup", function(event) {
        if (event.keyCode === 13) {
            // Cancel the default action, if needed
            event.preventDefault();
            // Trigger the button element with a click
            $("#searchButton").click();
        }
    });






});