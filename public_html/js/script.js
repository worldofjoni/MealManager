$(document).ready(function() {

    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
    var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl)
    })

    var star1 = "<i class=\"fas fa-star\"> </i>";
    var star2 = "<i class=\"far fa-star\"> </i>";
    var set = 3;

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

    // picture upload
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#picturePlaceholder').css('background', "url(" + e.target.result + ")");
            }

            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }

    $("#recipePic").change(function() {
        $("#picturePlaceholder").removeClass("visually-hidden");
        readURL(this);

    });



    $("#recipeCategory").on("input", function() {
        if (this.value == 0) {
            $("#newCategory").show();
        } else {
            $("#newCategory").hide();
        }
    });

    $("#ingredientSearch").on("change", function() {
        if (this.value == "+ New Ingredient") {
            $("#ingredientCard").find("input").prop('disabled', false);
        } else {
            $("#ingredientCard").find("input").prop('disabled', true);
        }
    });




});