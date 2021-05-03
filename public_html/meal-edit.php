<?php
include "../templates/header.php";
include "src/view/v-meal-edit.php";

$mev = new MealEditView();
$mev->determineMeal();

?>


<div class="container py-5 px-5 mx-auto" style="max-width: 80em;">
    <h1 mb-0>Edit Meal</h1>
    <hr class="mt-0">
    <form action="control/c-meal-edit.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $mev->getData('M_ID'); ?>">
        <div class="row">

            <!-- First Colom -->
            <div class="container col-lg-4">
                <div class="mb-3">
                    <label for="recipeName" class="form-label">Recipe Name</label>
                    <input type="text" class="form-control" id="recipeName" name="recipeName" value="<?php echo $mev->getData('Meal'); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="recipeCategory" class="form-label">Recipe Category</label>
                    <select class="form-select" aria-label="Default select example" id="recipeCategory" name="category" value="0" required>
                        <option value="" selected disabled>Select Category</option>
                        <?php $mev->getCategories(); ?>
                        <option value="0">+ New category</option>
                    </select>
                    <input type="text" placeholder="new category name" class="form-control mt-3 collapse" id="newCategory" name="newCategory">
                </div>

                <div class="mb-3">
                    <label for="stars" class="form-label mb-0 sr-only">Stars</label>
                    <input type="hidden" id="stars" value="<?php echo $mev->getData('Rating'); ?>" name="stars">
                    <div>
                        <?php for ($i = 1; $i <= 5; $i++) { ?>
                            <button class="star-select text-warning px-1" id="star-<?php echo $i; ?>" type='button' tabindex="-1"><i class="<?php echo ($i <= $mev->getData('Rating')) ? "fas" : "far"; ?> fa-sm fa-star"></i></button>
                        <?php } ?>
                    </div>

                </div>
                <div class="input-group pb-3">
                    <span class="input-group-text" id="portions-addon-1">For </span>
                    <input type="number" min="0" class="form-control" id="portions" name="portions" value="<?php echo $mev->getData('Portions'); ?>" required>
                    <span class="input-group-text" id="portions-addon-2"> Portion(s)</span>
                </div>
                <div class="mb-3">
                    <label for="descriptionArea" class="form-label">Beschreibung</label>
                    <textarea class="form-control" id="descriptionArea" rows="3" name="description"><?php echo $mev->getData('Description'); ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="recipeURL" class="form-label">Recipe URL</label>
                    <div class="input-group">
                        <input type="url" class="form-control" id="recipeURL" name="recipeURL" value="<?php echo $mev->getData('RecipeURL'); ?>">
                        <a <?php if ($mev->getData('RecipeURL') != "") {
                                echo 'href="' . $mev->getData('RecipeURL') . '" ';
                            } ?>target="_blank" class="btn btn-outline-secondary"><i class="fas fa-external-link-alt"></i></a>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="recipePic" class="form-label">Picture</label>
                    <input class="form-control" type="file" accept="image/*" id="recipePic" name="recipePic" <?php echo ($mev->getData('Picture') != "") ? "data-set" : ""; ?>>
                </div>
                <div class="ratio ratio-21x9 mb-3 <?php echo ($mev->getData('Picture') != "") ? "visually-hidden" : ""; ?> rounded" id="picturePlaceholder" style="background: url(uploads/<?php echo $mev->getData('Picture'); ?>);"></div>

            </div><!-- End First Colom -->

            <?php include "templates/meal-edit/ingredients-pane.php"; ?>
        </div>
        <div>
            <button type="submit" name="submit" value="submit" class="btn btn-primary">Save</button>
            <a class="btn btn-secondary" href=".">Cancel</a>
        </div>
    </form>
</div>





<?php include("../templates/footer.php"); ?>