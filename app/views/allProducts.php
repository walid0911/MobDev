<?php $this->view("header", $data); ?>

<div class="container-fluid d-flex flex-row justify-content-between p-0">
    <nav class="container col-3 p-4 bg-light">
        <form method="post" action="#" class="d-flex flex-column">
            <div class="d-flex flex-column justify-content-between">
                <label class="form-label" for="priceRange">Price</label>
                <div class="d-flex flex-row justify-content-between gap-2 mb-2" id="priceRange">
                    <input type="number" class="form-control px-1 py-0 text-center" placeholder="From 1000" aria-label="minPrice" name="minPrice" value="<?= isset($_POST['minPrice']) ? $_POST['minPrice'] : '';?>">
                    <input type="number" class="form-control px-1 py-0 text-center" placeholder="To 50000" aria-label="maxPrice" name="maxPrice" value="<?= isset($_POST['maxPrice']) ? $_POST['maxPrice'] : '';?>">
                </div>
                <button class="btn btn-primary py-0 w-50" name="action" type="submit" value="setPrice">Set price</button>
            </div>

            <hr>

            <div class="accordion">
                <div class="accordion-item border-0">
                    <h2 class="accordion-header bg-light" id="headingOne">
                        <button class="accordion-button p-0 py-1 bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Type
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show bg-light" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="all" id="flexCheckDefault" name="type[]" checked>
                                <label class="form-check-label" for="flexCheckDefault">
                                    All types
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="phones" id="flexCheckPhone" name="type[]">
                                <label class="form-check-label" for="flexCheckPhone">
                                    Phones
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="laptops" id="flexCheckLaptop" name="type[]">
                                <label class="form-check-label" for="flexCheckLaptop">
                                    Laptops
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr>

            <div class="accordion">
                <div class="accordion-item border-0">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button  p-0 py-1 bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                            Brand
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse show bg-light" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body ">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                                <label class="form-check-label" for="flexCheckDefault">
                                    All brands
                                </label>
                            </div>
                            <?php foreach ($data['marks'] as $mark): ?>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    <?= $mark ?>
                                </label>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>

            <hr>

            <button class="btn btn-primary" name="action" type="submit" value="filter">Filter</button>
        </form>
    </nav>

    <div class="container col-9 px-4 py-2">
        <p class="fs-3 fw-bold px-3">All products</p>
        <div class="row row-cols-1 row-cols-md-3 gy-4">
            <?php foreach ($data['products'] as $product):?>
                <div class="col">
                    <div class="card h-100">
                        <img src="<?= UPLOADS . $product->img->Attributes()?>" alt="phone1" class="card_img">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <h5 class="card-title"> <?= $product->mark . " " . $product->model; ?></h5>
                            <div class="card-text small">
                                <p>
                                    <strong>CPU :</strong> <?= $product->cpu;  ?> <br>
                                    <strong>GPU :</strong> <?= $product->gpu ?> <br>
                                    <strong>RAM :</strong> <?= $product->ram ?> <br>
                                </p>
                            </div>
                            <a href="<?=ROOT . "products/product/" . $product->productID?>" class="text-decoration-none link-info">Click for more info ...</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>


<?php $this->view("footer", $data);?>
