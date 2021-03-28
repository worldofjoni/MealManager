<?php include("../templates/header.php"); ?>


<div class="container py-5 px-5 mx-auto" style="max-width: 80em;">
    <h1 mb-0>Edit Meal</h1>
    <hr class="mt-0">
    <form action="control/c-meal-edit.php" method="post" enctype="multipart/form-data">
        <div class="row">
            <!-- First Colom -->
            <div class="container col-lg-4">
                <input type="hidden" name="id" value="0">
                <div class="mb-3">
                    <label for="recipeName" class="form-label">Recipe Name</label>
                    <input type="text" class="form-control" id="recipeName" name="recipeName" required>
                </div>
                <div class="mb-3">
                    <label for="recipeCategory" class="form-label">Recipe Category</label>
                    <select class="form-select" aria-label="Default select example" id="recipeCategory" name="category" value="0" required>
                        <option value="" selected disabled>Select Category</option>
                        <option value="1">Potato</option>
                        <option value="2">Noodle</option>
                        <option value="3">Salat</option>
                        <option value="0">+ New category</option>
                    </select>
                    <input type="text" placeholder="new category name" class="form-control mt-3 collapse" id="newCategory" name="newCategory">
                </div>

                <div class="mb-3">
                    <label for="stars" class="form-label mb-0 sr-only">Stars</label>
                    <input type="hidden" id="stars" value="3" name="stars">
                    <div>
                        <button class="star-select text-warning px-1" id="star-1" type='button' tabindex="-1"><i class="fas fa-sm fa-star"></i></button>
                        <button class="star-select text-warning px-1" id="star-2" type='button' tabindex="-1"><i class="fas fa-sm fa-star"></i></button>
                        <button class="star-select text-warning px-1" id="star-3" type='button' tabindex="-1"><i class="fas fa-sm fa-star"></i></button>
                        <button class="star-select text-warning px-1" id="star-4" type='button' tabindex="-1"><i class="far fa-sm fa-star"></i></button>
                        <button class="star-select text-warning px-1" id="star-5" type='button' tabindex="-1"><i class="far fa-sm fa-star"></i></button>
                    </div>

                </div>
                <div class="mb-3">
                    <label for="descriptionArea" class="form-label">Beschreibung</label>
                    <textarea class="form-control" id="descriptionArea" rows="3" name="description"></textarea>
                </div>
                <div class="mb-3">
                    <label for="recipeURL" class="form-label">Recipe URL</label>
                    <input type="url" class="form-control" id="recipeURL" name="recipeURL">
                </div>
                <div class="mb-3">
                    <label for="recipePic" class="form-label">Picture</label>
                    <input class="form-control" type="file" accept="image/*" id="recipePic" name="recipePic">
                </div>
                <div class="ratio ratio-21x9 mb-3 visually-hidden rounded" id="picturePlaceholder"></div>

            </div><!-- End First Colom -->

            <!-- Ingredients Colum -->
            <div class="col-lg-8">
                <h4 class="text-center pb-3">Ingredients</h4>
                <div class="row">
                    <div class="col">
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
                        <div class="p-1">
                            <button class="btn btn-primary">Add</button>
                            <button class="btn btn-primary">Remove</button>
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
        </div>
        <div>
            <button type="submit" name="submit" value="submit" class="btn btn-primary">Save</button>
            <a class="btn btn-secondary" href=".">Cancel</a>
        </div>
    </form>
</div>





<?php include("../templates/footer.php"); ?>