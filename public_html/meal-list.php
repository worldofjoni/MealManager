<?php include("../templates/header.php"); ?>

<div class="container py-5 px-2 mx-auto" style="max-width: 50em;">
    <h1>Meals</h1>
    <hr class="mt-0">
    
    <!-- Search Bar -->
    <div class="row">
        <form class="form col" method="get" >
            <div class="input-group mb-2 pl-0 col">
                <input type="search" class="form-control" id="searchBar" placeholder="Search" name="search" >
                <label for="searchBar" class="sr-only" value>Search</label>
                <button type="submit" class="btn btn-secondary" id="searchButton" name="submit" value="submit"><i class="fas fa-search"></i></button>
            </div>
        </form>
        <div class="col-auto ps-0">
            <!-- <div class="btn-group"> -->
            <button class="btn btn-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#filterCollapse" aria-expanded="false" aria-controls="filterCollapse"><i class="fas fa-filter"></i></button>
            <a class="btn btn-primary" role="button" href="meal-edit.php" ><i class="fas fa-plus"></i></a>
            <!-- </div> -->
        </div>
    </div>
    <div class="collapse" id="filterCollapse">
        <div class="card card-body">
            Filter filter....
        </div>
    </div>

    <!-- Meal list -->
    <div class="my-3">

        <?php include "templates/meal-list/meal-list-entry.php"?>


    </div>



</div>









<?php include("../templates/footer.php"); ?>