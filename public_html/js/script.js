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
            $("#star-" + i).children().css("transform", "scale(1)");
        }
        for (var i = parseInt(oid); i >= 0; i--) {
            $("#star-" + i).children().removeClass('far');
            $("#star-" + i).children().addClass('fas');
            $("#star-" + i).children().css("transform", "scale(1.2)");
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
            for (var i = 5; i >= 0; i--) {
                $("#star-" + i).children().css("transform", "scale(1)");
                // $("#star-" + i).children().addClass('fas');
                // $("#star-" + i).children().css("transform", "scale(1.1)");
            }
        });

    $(".star-select").click(function() {

        set = getId(this);
        setHtmlTo(set);
        $("#stars").val(set);
        setEffect("rotate(.2turn) scale(1.2)", set);
        setTimeout(setEffect, 250, "rotate(0)", set);

    });

    // picture upload +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    function readURL(input) {
        if (!input) return;
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#picturePlaceholder').css('background', "url(" + e.target.result + ")");
            }

            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }

    function updatePic() {
        if ($("#recipePic").val() != "" || $("#recipePic").data('set') != undefined) {
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

    // Ingredient list selection
    var ingredients, currentIngredient;

    function loadIngredient() {
        $("button.ingredient.active").removeClass("active");
        $(this).addClass("active");
        $.get("control/c-get-ingredients.php", function(data) {
            ingredients = JSON.parse(data);
            // console.log(ingredients);
        });
        $("#ingredient-detail").load("view/ingredient-detail.php?id=" + $(this).data("ingredient-id"), ingredientLoaded);


    }

    function ingredientLoaded() {
        // ingredient autocompeate
        $("#ingredientName").change(function() {
            // check if ingredient exists and set vegettarian and lock accprdingly
            var name = $(ingredientName).val();
            var found = ingredients.find(ing => ing.Ingredient == name);
            if (found) {
                // console.log("found");
                $("#ingredientName").attr("disabled", true);
                $("#ingredientVegie").attr("checked", found.vegetarian);
                $("#ingredientVegie").attr("disabled", true);
                currentIngredient = found;
                console.log(currentIngredient);
            }

        });
    }


    $("button.ingredient").click(loadIngredient);
    loadIngredient.call($("button.ingredient")[0]);



});