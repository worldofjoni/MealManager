<?php include("../templates/header.php"); ?>


<div class="container py-5 px-2 mx-auto" style="max-width: 80em;">
    <h1>Edit Meal</h1>
    <form method="get">
        <div class="row">
            <div class="col-lg-4" style="max-width: 40em;">
                <div class="mb-3">
                    <label for="recipeName" class="form-label">Recipe Name</label>
                    <input type="text" class="form-control" id="recipeName" >
                </div>
                <div class="mb-3">
                    <label for="stars" class="form-label mb-0 sr-only">Stars</label>
                    <input type="hidden" id="stars" value="3">
                    <div>
                        <button class="star-select text-warning px-1" id="star-1" type='button' tabindex="-1"><i class="fas fa-star"></i></button>
                        <button class="star-select text-warning px-1" id="star-2" type='button' tabindex="-1"><i class="fas fa-star"></i></button>
                        <button class="star-select text-warning px-1" id="star-3" type='button' tabindex="-1"><i class="fas fa-star"></i></button>
                        <button class="star-select text-warning px-1" id="star-4" type='button' tabindex="-1"><i class="far fa-star"></i></button>
                        <button class="star-select text-warning px-1" id="star-5" type='button' tabindex="-1"><i class="far fa-star"></i></button>
                    </div>
                    
                </div>
                <div class="mb-3">
                    <label for="descriptionArea" class="form-label">Beschreibung</label>
                    <textarea class="form-control" id="descriptionArea" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="recipeURL" class="form-label">Recipe URL</label>
                    <input type="url" class="form-control" id="recipeURL">
                </div>
                <div class="mb-3">
                    <label for="recipePic" class="form-label">Picture</label>
                    <input class="form-control" type="file" accept="image/*" id="recipePic">
                </div>
                <div class="ratio ratio-21x9 mb-3 visually-hidden rounded" id="picturePlaceholder">
                </div>
                

                <button type="submit" value="submit" class="btn btn-primary">Save</button>
                <a class="btn btn-secondary" href="#">Cancel</a>
            </div>
        </div>
    </form>



</div>


<?php include("../templates/footer.php"); ?>