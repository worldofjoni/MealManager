<!-- Ingredients Colum -->
<div class="col-lg-8 ps-lg-5 pb-3">
    <h4 class="text-center pb-3">Ingredients</h4>
    <div class="row">
        <div class="col-sm" id="ingredientFrame">

            <?php include "templates/meal-edit/ingredients-list.php" ?>
        </div>
        <div class="col-sm-auto d-flex px-0">
            <div class="align-self-center d-sm-grid gap-2 m-auto my-3">
                <button type="button" class="btn btn-primary" id="addButton"><i class="fas fa-chevron-left"></i></button>
                <button type="button" class="btn btn-secondary" id="removeButton"><i class="fas fa-minus-circle"></i></button>
            </div>
        </div>
        <div class="col" id="ingredient-detail">
        </div>

    </div>
</div> <!-- End Ingredients Colum -->