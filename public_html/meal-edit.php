<?php include("../templates/header.php"); ?>


<div class="container py-5 px-2 mx-auto" style="max-width: 80em;">
    <h1>Edit Meal</h1>
    <form>
        <div class="row">
            <div class="col-lg-4" style="max-width: 40em;">
                <div class="mb-3">
                    <label for="recipeName" class="form-label">Recipe Name</label>
                    <input type="text" class="form-control" id="recipeName">
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
                <!-- <div class="placeholder ratio ratio-21x9 bg-dark mb-3">
                </div> -->

            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>



</div>


<?php include("../templates/footer.php"); ?>