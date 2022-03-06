<!-- Meal Card -->
<div class="card bg-light mb-3">
    <div class="row g-0" href="#">
        <div class="col-4 rounded-start" style='background: url("<?php echo ($meal['Picture'] != "") ? "uploads/".$meal['Picture'] : "img/noPic.jpg" ?>"); background-size: cover; background-position: center;'></div>
        <div class="col-8">
            <div class="card-body">
                <h5 class="card-title mb-3"><?php echo $meal['Meal']; ?>
                    <div class="float-none mt-1 mt-sm-0 float-sm-end text-warning">
                        <?php for ($i = 1; $i <= 5; $i++) { ?>
                            <i class="<?php echo ($i <= $meal['Rating'])  ? "fas" : "far"; ?> fa-star"></i>
                        <?php } ?>
                    </div>
                </h5>
                <!-- <div class="float-end">
                            <a class="btn btn-danger" href="#" role="button"><i class="fas fa-times"></i></a>
                            <a class="btn btn-secondary" href="#" role="button"><i class="fas fa-pen"></i></a>
                            <span class="px-1"></span>
                            <a class="btn btn-primary" href="#" role="button"><i class="fas fa-external-link-alt"></i></a>
                        </div> -->
                <button type="button" class="btn btn-primary stretched-link float-end hidden-xs" data-bs-toggle="modal" data-bs-target="#mealDetail-<?php echo $meal['M_ID'] ?>"><i class="fas fa-external-link-alt"></i></button>
                <?php
                    $sql = "SELECT * FROM (mealingredient mi INNER JOIN ingredient i ON mi.I_ID = i.I_ID) WHERE mi.M_ID = ? AND Main = 1 ORDER BY Ingredient";
                    $dbc = DB::connect();
                    $sth = $dbc->prepare($sql);
                    $sth->execute([$meal['M_ID']]);
                    $mapper = function ($elem) {return $elem['Ingredient'];};
                    $reslist = array_map($mapper, $sth->fetchAll());
                    if (count($reslist) != 0) { ?>
                        <h6 class="mb-0">Main Ingredients:</h6>
                        <p class="card-text mb-1">
                        <?php echo implode(", ", $reslist); ?>
                        </p>
                    <?php
                    } else { ?>
                        <h6 class="mb-0">&nbsp;</h6>
                        <p class="card-text mb-1">&nbsp;</p>
                    <?php } ?>
                <p class="card-text text-end"><small class="text-muted">Last Served: 0 days ago</small></p>
            </div>
        </div>
        <?php include "t-meal-list-detail.php" ?>
    </div>
</div>