<?php

    class View {
        static function formattedCar($car, $bodyTypes, $colors) { ?>
            <tr id="<?= $car->id ?>">
                <th class="align-middle text-center" scope="row"><?= $car->id ?></th>
                <td class="align-middle text-center"><div class="d-inline-block" placeholder="Marque" contenteditable="true" name="brand"><?= $car->brand ?></div> <div class="d-inline-block" placeholder="Modèle" contenteditable="true" name="model"><?= $car->model ?></div></td>
                <td class="align-middle text-center"><div placeholder="Année" contenteditable="true" name="year"><?= $car->year ?></div></td>
                <td class="align-middle text-right"><div placeholder="Kilométrage" class="d-inline-block" contenteditable="true" name="mileage"><?= $car->mileage ?></div> km</td>
                <td class="align-middle text-center">
                    <select class="form-control" name="idBodyType">
                        <?php foreach($bodyTypes as $bodyType): ?>
                            <option value="<?= $bodyType->id ?>"<?php if ($car->idBodyType == $bodyType->id) echo " selected"; ?>><?= $bodyType->name ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td class="align-middle text-center ">
                    <select class="form-control" name="idColor">
                        <?php foreach($colors as $color): ?>
                            <option value="<?= $color->id ?>"<?php if ($car->idColor == $color->id) echo " selected"; ?>><?= $color->name ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td class="align-middle text-right">
                    <div class="d-inline-block" placeholder="Prix" contenteditable="true" name="price"><?= $car->price ?></div> €
                </td>
                <td class="align-middle text-center">
                    <input type="checkbox" data-toggle="toggle" data-on="Oui" data-off="Non"<?php if ($car->isVisible) echo " checked"; ?>>
                </td>
                <td class="align-middle text-right">
                    <button type="button" class="btn btn-description" data-toggle="modal" data-target="#descriptionModal">
                        <i class="fa fa-stack-exchange"></i>
                    </button>
                    <button type="button" class="btn btn-pictures" data-toggle="modal" data-target="#picturesModal">
                        <i class="fa fa-camera-retro"></i>
                    </button>
                    <button type="button" class="btn btn-remove-car" data-toggle="modal" data-target="#confirmationModal">
                        <i class="fa fa-times"></i>
                    </button>
                </td>
            </tr>
        <?php }

        static function formattedPicture($picture) { ?>
            <div id="<?= $picture->id ?>" class="col-md-4 p-3 position-relative">
                <img src="../lib/img/cars/<?= $picture->filename ?>" alt="Lights" style="width:100%">
                <button type="button" class="btn position-absolute btn-gallery btn-remove-picture" aria-label="Close" data-toggle="modal" data-target="#confirmationModal">
                    <i class="fa fa-times fa-1x"></i>
                </button>
            </div>
        <?php }

        static function formattedDetails($car) { 
            $pictures = $car->pictures; ?>
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?= $car->brand ?> <?= $car->model ?> <?= $car->year ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <?php foreach(range(0, count($pictures)-1) as $i): ?>
                            <li data-target="#carouselExampleIndicators" data-slide-to="<?= $i; ?>"<?php if ($i == 0) echo " class='active'"; ?>></li>
                        <?php endforeach; ?>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <?php foreach($pictures as $key => $picture): ?>
                            <div class="carousel-item<?php if ($key == 0) echo " active"; ?>">
                                <img class="d-block img-fluid" src="lib/img/cars/<?= $picture->filename; ?>" alt="Slide">
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <div class="text-center m-3">
                    <?= $car->description ?>
                </div>
                <div class="text-center">
                    <?= number_format($car->price, 0, ',', ' ') ?> €
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
            </div>

       <?php }
    } 
?>