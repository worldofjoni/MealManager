<!-- Modal Preview -->
<div class="modal fade" id="mealDetail-<?php echo $meal['M_ID'] ?>" tabindex="-1" aria-labelledby="mealDetailLabel-<?php echo $meal['M_ID'] ?>" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mealDetailLabel-<?php echo $meal['M_ID'] ?>"><?php echo $meal['Meal']; ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-2 no-x-scroll">

                <div class="card mb-3">
                    <div class="ratio rounded-top" style="--bs-aspect-ratio: 22%; background: url('<?php echo ($meal['Picture'] != "") ? "uploads/" . $meal['Picture'] : "img/noPic.jpg" ?>'); background-size: cover; background-position: center;"></div>
                    <div class="card-body row">
                        <div class="col">For <kbd class="bg-secondary"><?php echo $meal['Portions']; ?></kbd> people</div>
                        <div class="col text-warning text-end"><?php for ($i = 1; $i <= 5; $i++) { ?><i class="<?php echo ($i <= $meal['Rating'])  ? "fas" : "far"; ?> fa-star"></i><?php } ?></div>
                    </div>
                </div>
                <div class="card mb-3">
                    <?php
                        $sql = "SELECT * FROM (mealingredient mi INNER JOIN ingredient i ON mi.I_ID = i.I_ID) LEFT OUTER JOIN Unit u ON mi.U_ID = u.U_ID WHERE mi.M_ID = ? ORDER BY Main DESC, Ingredient";
                        $dbc = DB::connect();
                        $sth = $dbc->prepare($sql);
                        $sth->execute([$meal['M_ID']]);
                        $res = $sth->fetchAll() ?>
                    <h6 class="card-header">Ingredients <span class="badge bg-secondary rounded-pill float-end"><?php echo count($res);?></span> </h6>
                    <ul class="list-group list-group-flush">

                            <?php foreach ($res as $ing) { ?>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-4 col-sm-3 col-lg-2 text-end"><kbd class="bg-success"><?php echo $ing['Amount']." ".$ing["Unit"];?></kbd></div>
                                    <div class="col"><?php echo $ing['Ingredient'];?></div>
                                </div>
                            </li>

                        <?php }?>

                    </ul>
                </div>

                <div class="card">
                    <h6 class="card-header">Description</h6>
                    <div class="card-body">
                        <?php echo MealList::convertMarkdown($meal['Description']); ?>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <div class=" text-start me-auto text-muted">Last served 0 days ago</div>
                <div>
                    <?php if ($meal['RecipeURL'] != "") { ?>
                        <a type="button" class="btn btn-primary" href="<?php echo $meal['RecipeURL']; ?>" target="_blank"><i class="fas fa-scroll"></i></i></a>
                        <span class="mx-1"></span>
                    <?php } ?>
                    <button class="btn btn-danger" data-bs-toggle="popover" data-bs-trigger="click" data-bs-placement="top" title="Sure?" data-bs-html="true" data-bs-content='<a href="api/form/a-delete-meal.php?id=<?php echo $meal['M_ID']; ?>" class="btn btn-danger me-2">YES</a>'><i class="fas fa-times"></i></button>
                    <span class="mx-1"></span>
                    <a type="button" class="btn btn-secondary" href="meal-edit.php?id=<?php echo $meal['M_ID'] ?>"><i class="fas fa-pen"></i></a>
                </div>
                <!-- <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button> -->
            </div>
        </div>
    </div>
</div>