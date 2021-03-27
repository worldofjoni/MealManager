<?php include("../templates/header.php"); ?>

<div class="container py-5 px-2 mx-auto" style="max-width: 50em;">
    <h1>Meals</h1>
    <hr class="mt-0">
    
    <div class="row">
        <form class="form col">
            <div class="input-group mb-2 pl-0 col">
                <input type="search" class="form-control" id="search" placeholder="Search">
                <label for="search" class="sr-only">Search</label>
                <button type="submit" class="btn btn-secondary "><i class="fas fa-search"></i></button>
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

    <div class="my-3">

        <!-- Meal Card -->
        <div class="card bg-light mb-3">
            <div class="row g-0" href="#">
                <div class="col-4 rounded-start" style='background: url("img/burger.jpg"); background-size: cover; background-position: center;'></div>
                <div class="col-8">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Hamburger
                            <div class="float-end text-warning"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i></div>
                        </h5>
                        <!-- <div class="float-end">
                            <a class="btn btn-danger" href="#" role="button"><i class="fas fa-times"></i></a>
                            <a class="btn btn-secondary" href="#" role="button"><i class="fas fa-pen"></i></a>
                            <span class="px-1"></span>
                            <a class="btn btn-primary" href="#" role="button"><i class="fas fa-external-link-alt"></i></a>
                        </div> -->
                        <button type="button" class="btn btn-primary stretched-link float-end" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-external-link-alt"></i></button>
                        <h6 class="mb-0">Main Ingredients:</h6>
                        <p class="card-text mb-1">Beef, Chease, Buns</p>
                        <p class="card-text text-end"><small class="text-muted">Last Served: 0 days ago</small></p>
                    </div>
                </div>
                <!-- Modal Preview -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-tFitle" id="exampleModalLabel">Hamburger</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-2 no-x-scroll">

                                <div class="card mb-3">
                                    <div class="ratio rounded-top" style="--bs-aspect-ratio: 22%; background: url('img/burger.jpg'); background-size: cover; background-position: center;"></div>
                                    <div class="card-body row">
                                        <div class="col">For <kbd class="bg-secondary">5</kbd> people</div>
                                        <div class="col text-warning text-end"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i></div>
                                    </div>
                                </div>
                                <div class="card mb-3">
                                    <h6 class="card-header">Ingredients <span class="badge bg-secondary rounded-pill float-end">6</span> </h6>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><div class="row">
                                            <div class="col-3 col-lg-2 text-end"><kbd class="bg-success">0,5 kg</kbd></div>
                                            <div class="col">Beaf</div>
                                        </div></li>
                                        <li class="list-group-item"><div class="row">
                                            <div class="col-3 col-lg-2 text-end"><kbd class="bg-success">500g</kbd></div>
                                            <div class="col">Chese</div>
                                        </div></li>
                                        <li class="list-group-item"><div class="row">
                                            <div class="col-3 col-lg-2 text-end"><kbd class="bg-success">10</kbd></div>
                                            <div class="col">Bun</div>
                                        </div></li>
                                        <li class="list-group-item"><div class="row">
                                            <div class="col-3 col-lg-2 text-end"><kbd class="bg-secondary">2</kbd></div>
                                            <div class="col">Tomato</div>
                                        </div></li>
                                        <li class="list-group-item"><div class="row">
                                            <div class="col-3 col-lg-2 text-end"><kbd class="bg-secondary">1</kbd></div>
                                            <div class="col">Salat</div>
                                        </div></li>
                                        <li class="list-group-item"><div class="row">
                                            <div class="col-3 col-lg-2 text-end"><kbd class="bg-secondary">3</kbd></div>
                                            <div class="col">Onion</div>
                                        </div></li>
                                        
                                    </ul>
                                </div>

                                <div class="card">
                                    <h6 class="card-header">Description</h6>
                                    <div class="card-body">
                                        <!-- <h5 class="card-title">Description</h5> -->
                                        This is how you make a tasty Hamburger: <br>
                                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Possimus rerum expedita aliquid, debitis ea quod tempore quae suscipit itaque dolorem dolor qui eveniet mollitia error quisquam, dolores asperiores consequatur saepe aperiam quis praesentium incidunt! Repellendus id earum officiis molestiae ad praesentium, quia impedit, consectetur, suscipit assumenda adipisci optio vel eligendi!
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <div class=" text-start me-auto text-muted">Last served 0 days ago</div>
                                <a type="button" class="btn btn-primary" href="https://natashaskitchen.com/perfect-burger-recipe/" target="_blank"><i class="fas fa-scroll"></i></i></a>
                                <span class="mx-1"></span>
                                <button class="btn btn-danger" data-bs-toggle="popover" data-bs-trigger="click" data-bs-placement="top" title="Sure?" data-bs-html="true" data-bs-content='<a href="?delete=1" class="btn btn-danger me-2">YES</a>'><i class="fas fa-times"></i></button>
                                <span class="mx-1"></span>
                                <a type="button" class="btn btn-secondary" href="meal-edit.php"><i class="fas fa-pen"></i></a>
                                <!-- <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>





    </div>



</div>









<?php include("../templates/footer.php"); ?>