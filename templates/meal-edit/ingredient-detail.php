<!-- <div class="pb-3">
    <input class="form-control" list="ingredientSearchOptions" id="ingredientSearch" placeholder="Type to search..." autocomplete="off" onclick="this.value=''">
    <datalist id="ingredientSearchOptions">
        <option value="Potatos">
        <option value="Noodles">
        <option value="Tomatos">
        <option value="Letters">
        <option value="+ New Ingredient">
    </datalist>
</div> -->

<?php ?>

<div class="card mb-3" id="ingredientCard">
    <div class="card-body">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="ingredientName" list="ingredientsDatalist" data-ingredient-id="<?php echo $iv->getData('I_ID'); ?>" placeholder="Ingredient Name" <?php echo ($iv->getData('I_ID') == 0) ? "" : 'value="' . $iv->getData('Ingredient') . '" disabled'; ?>>
            <label for="ingredientName">Ingredient Name</label>
            <datalist id="ingredientsDatalist">
                <?php IngredietView::getIngredients();?>

            </datalist>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="ingredientVegie" <?php echo ($iv->getData('I_ID') == 0) ? "" : "disabled"; echo $iv->getData('Vegetarian') ? " checked" : ""; ?>>
            <label class="form-check-label" for="ingredientVegie">vegetarian</label>
        </div>

    </div>
</div>
<div class="form-check mb-3">
    <input class="form-check-input" type="checkbox" value="" id="mainIngredient" checked>
    <label class="form-check-label" for="mainIngredient">Main Ingredient</label>
</div>
<div class="input-group mb-3">
    <input type="number" class="form-control" placeholder="Amount" aria-label="Amount">
    <select class="form-select" aria-label="Default select example">
        <option selected value="" disabled>Unit Type</option>
        <?php IngredietView::getUnits(); ?>
    </select>
</div>