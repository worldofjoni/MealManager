<!-- Ingredients Colum -->
<div class="col-lg-8">
    <h4 class="text-center pb-3">Ingredients</h4>
    <div class="row">
        <div class="col-sm">
            <div class="input-group pb-3">
                <span class="input-group-text" id="portions-addon-1">For </span>
                <input type="number" min="0" class="form-control" id="portions" name="portions" value="<?php echo $mev->getData('Portions');?>" required>
                <span class="input-group-text" id="portions-addon-2"> Portion(s)</span>
            </div>
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                    The current link item
                </a>
                <a href="#" class="list-group-item list-group-item-action">A second link item</a>
                <a href="#" class="list-group-item list-group-item-action">A third link item</a>
                <a href="#" class="list-group-item list-group-item-action">A fourth link item</a>
                <a href="#" class="list-group-item list-group-item-action">A fourth link item</a>
                <a href="#" class="list-group-item list-group-item-action">A fourth link item</a>
            </div>
        </div>
        <div class="col-sm-auto d-flex px-0">
            <div class="align-self-center d-sm-grid gap-2 m-auto my-3">
                <button class="btn btn-primary"><i class="fas fa-chevron-left"></i></button>
                <button class="btn btn-secondary"><i class="fas fa-minus-circle"></i></button>
            </div>
        </div>
        <div class="col">
            <!-- <form action=""> -->
            <div class="pb-3">
                <!-- <form class="form"> -->

                <input class="form-control" list="ingredientSearchOptions" id="ingredientSearch" placeholder="Type to search..." autocomplete="off" onclick="this.value=''">
                <datalist id="ingredientSearchOptions">
                    <option value="Potatos">
                    <option value="Noodles">
                    <option value="Tomatos">
                    <option value="Letters">
                    <option value="+ New Ingredient">
                </datalist>

                <!-- </form> -->
            </div>
            <div class="card mb-3" id="ingredientCard">
                <div class="card-body">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="ingredientName" placeholder="Ingredient Name" disabled>
                        <label for="ingredientName">Ingredient Name</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="ingredientVegie" checked disabled>
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
                    <option selected>Unit Type</option>
                    <option value="1">kg</option>
                    <option value="2">Pice</option>
                    <option value="3">Bags</option>
                </select>
            </div>
            <!-- </form> -->
        </div>

    </div>
</div> <!-- End Ingredients Colum -->