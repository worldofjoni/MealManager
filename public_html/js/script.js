$(document).ready(function() {

    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
    var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl)
    })


    // Star selector ++++++++++++++++++++++++++++++++++++++++++++
    var star1 = "<i class=\"fas fa-star\"> </i>";
    var star2 = "<i class=\"far fa-star\"> </i>";
    var set = $("#stars").val();

    function getId(obj) {
        var oid = $(obj).attr('id').substr(5, 6);
        // console.log(oid);
        return oid;
    };

    function setHtmlTo(oid) {
        for (var i = 5; i > parseInt(oid); i--) {
            $("#star-" + i).children().removeClass('fas');
            $("#star-" + i).children().addClass('far');
        }
        for (var i = parseInt(oid); i >= 0; i--) {
            $("#star-" + i).children().removeClass('far');
            $("#star-" + i).children().addClass('fas');
        }
    };

    function setEffect(effect, toId) {
        for (var i = 0; i <= parseInt(toId); i++) {
            $("#star-" + i).children().css("transform", effect);
        }
    };


    $(".star-select").hover(function() {

            setHtmlTo(getId(this));
        },
        function() {
            setHtmlTo(set);
        });

    $(".star-select").click(function() {

        set = getId(this);
        setHtmlTo(set);
        $("#stars").val(set);
        setEffect("rotate(.2turn)", set);
        setTimeout(setEffect, 250, "rotate(0)", set);

    });

    // picture upload +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#picturePlaceholder').css('background', "url(" + e.target.result + ")");
            }

            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }
    console.log($("#recipePic").data('set'))

    function updatePic() {
        if ($("#recipePic").val() != "" || $("#recipePic").data('set') != undefined) {
            console.log("first");
            $("#picturePlaceholder").removeClass("visually-hidden");
            readURL($("#recipePic")[0]);
        } else {
            $("#picturePlaceholder").addClass("visually-hidden");
        }

    }

    $("#recipePic").change(updatePic);
    updatePic();


    // new Category Field ++++++++++++++++++++++++++++++++++++++++++++++++++++++
    function checkCategory() {
        if ($("#recipeCategory").val() == 0) {
            $("#newCategory").show();
            $("#newCategory").prop("required", true);
        } else {
            $("#newCategory").hide();
            $("#newCategory").prop("required", false);
        }
    };
    checkCategory();
    $("#recipeCategory").on("input", checkCategory);

    $("#ingredientSearch").on("change", function() {
        if (this.value == "+ New Ingredient") {
            $("#ingredientCard").find("input").prop('disabled', false);
        } else {
            $("#ingredientCard").find("input").prop('disabled', true);
        }
    });


    $("#searchBar").on("keyup", function(event) {
        if (event.keyCode === 13) {
            // Cancel the default action, if needed
            event.preventDefault();
            // Trigger the button element with a click
            $("#searchButton").click();
        }
    });



});