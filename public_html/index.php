<?php include("../templates/header.php"); ?>

<main class="flex-grow-1">
    <div class="container py-5 px-2" style="max-width: 50em;">
        <h1>Meals</h1>
        <form class="form row">
            <div class="form-group mb-2 pl-0 col">
                <label for="search" class="sr-only">Search</label>
                <input type="text" class="form-control" id="search" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-secondary mb-2 me-3 col-auto"><i class="fas fa-search"></i></button>
        </form>

        <div class="my-3">

            <!-- Meal Card -->
            <div class="card bg-light mb-3">
                <div class="row g-0">
                    <div class="col-4 rounded-start" style='background: url("img/burger.jpg"); background-size: cover; background-position: center;'></div>
                    <div class="col-8">
                        <div class="card-body">
                            <h5 class="card-title mb-3">Hamburger
                                <div class="float-end text-warning"><i class="far fa-star"></i><i class="far fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                            </h5>
                            <div class="float-end">
                                <a class="btn btn-danger" href="#" role="button"><i class="fas fa-times"></i></a>
                                <!-- <a class="btn btn-secondary" href="#" role="button"><i class="fas fa-pen"></i></a> -->
                                <span class="px-1"></span>
                                <a class="btn btn-primary" href="#" role="button"><i class="fas fa-external-link-alt"></i></a>
                            </div>
                            <h6 class="mb-0">Main Ingredients:</h6>
                            <p class="card-text mb-1">Beef, Chease, Buns</p>
                            <p class="card-text text-end"><small class="text-muted">Last Served: 0 days ago</small></p>
                        </div>
                    </div>
                </div>
            </div>
  




        </div>



    </div>

    </div>








</main>



<?php include("../templates/footer.php"); ?>