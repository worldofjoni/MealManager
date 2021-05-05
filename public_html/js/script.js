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

    function findGetParameter(parameterName) {
        var result = null,
            tmp = [];
        var items = location.search.substr(1).split("&");
        for (var index = 0; index < items.length; index++) {
            tmp = items[index].split("=");
            if (tmp[0] === parameterName) result = decodeURIComponent(tmp[1]);
        }
        return result;
    }

    function refreshIngredientVar() {
        $.get("control/c-get-ingredients.php", function(data) {
            ingredients = JSON.parse(data);
            // console.log(ingredients);
        });
    }

    function loadIngredient() {
        $("button.ingredient.active").removeClass("active");
        $(this).addClass("active");
        refreshIngredientVar()
        $("#ingredient-detail").load("view/ingredient-detail.php?i_id=" + $(this).data("ingredient-id") + "&m_id=" + findGetParameter("id"), ingredientLoaded);


    }

    function ingredientLoaded(data) {
        // ingredient autocompleate ---------------------------------------------+
        $("#ingredientName").change(function() {
            // check if ingredient exists and set vegettarian and lock accprdingly
            var name = $("#ingredientName").val();
            var found = ingredients.find(ing => ing.Ingredient == name);
            if (found) {
                // console.log("found");
                $("#ingredientName").attr("disabled", true);
                $("#ingredientName").data("ingredient-id", found.I_ID);
                // console.log($("#ingredientName").data("ingredient-id"))
                $("#ingredientVegie").attr("checked", found.vegetarian);
                $("#ingredientVegie").attr("disabled", true);

                currentIngredient = found;
                // console.log(currentIngredient);
            }

        });
    }


    $("button.ingredient").click(loadIngredient);
    loadIngredient.call($("button.ingredient")[0]);

    // ingredient delete button
    $("#removeButton").click(function() {
        iid = $(".ingredient.active").data("ingredient-id")
        mid = findGetParameter("id");
        if (iid != 0 && mid != 0) {
            deleteIngredient(mid, iid);
        }

    });

    function deleteIngredient(meal, ingredient) {
        $.post("control/c-remove-ingredient.php", { m_id: meal, i_id: ingredient }, function(data) {
            console.log("removed: " + data)
            $(".ingredient.active").remove()
            loadIngredient.call($("button.ingredient")[0]);
            refreshIngredientVar()
        });
    }

    $("#addButton").click(function() {
        iid = $("#ingredientName").data("ingredient-id")
        ingredientName = $("#ingredientName").val();
        isVeg = $("#ingredientVegie").prop("checked")
        isnew = $("#ingredientName").attr("disabled") != "disabled"

        if (isnew) {
            $.post("control/c-create-ingredient.php", { i_name: ingredientName, i_vegetarian: isVeg }, linkIngredient);
        } else {
            linkIngredient(iid);
        }
    });

    function linkIngredient(data) {
        refreshIngredientVar()
        mid = findGetParameter("id");
        isMain = $("#mainIngredient").prop("checked")
        amountVal = $("#ingredientAmount").val()
        unit = $("#IngrUnit").find(":selected").val()

        $.post("control/c-add-ingredient.php", { m_id: mid, i_id: data, main: isMain, amount: amountVal, u_type: unit }, function(data) {
            refreshIngredientVar()
            reloadIngredientsList()
            console.log(data);
        });

    }

    function reloadIngredientsList() {

        $("#ingredientFrame").load("view/ingredient-list.php?id=" + findGetParameter("id"), function() {
            $("button.ingredient").click(loadIngredient);
            loadIngredient.call($("button.ingredient")[0]);

        });
    }

});