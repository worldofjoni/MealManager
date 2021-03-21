<?php include("../templates/header.php"); ?>

<main class="flex-grow-1 px-3">
    <div class="container py-5 px-2 mx-auto" style="max-width: 50em;">
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
                <div class="row g-0" href="#">
                    <div class="col-4 rounded-start" style='background: url("img/burger.jpg"); background-size: cover; background-position: center;'></div>
                    <div class="col-8">
                        <div class="card-body">
                            <h5 class="card-title mb-3">Hamburger
                                <div class="float-end text-warning"><i class="far fa-star"></i><i class="far fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
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
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-tFitle" id="exampleModalLabel">Hamburger</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    ...
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#modalDelete"><i class="fas fa-times"></i></button>
                                    <span class="mx-1"></span>
                                    <button type="button" class="btn btn-secondary"><i class="fas fa-pen"></i></button>
                                    <!-- <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button> -->
                                </div>
                            </div>
                            <!-- Modal Delete -->
                            <div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="modalDeleteLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalDeleteLabel">Delete?</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Do you really want to delete Hamburger permanently?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>





        </div>



    </div>

    </div>








</main>



<?php include("../templates/footer.php"); ?>