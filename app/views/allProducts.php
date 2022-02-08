<?php $this->view("header", $data); ?>

<div class="container-fluid row row-cols-1 row-cols-md-2 gx-4 justify-content-between p-0">
    <nav class="col-sm-4 col-md-3 p-4 bg-light">
        <form method="get" action="<?=ROOT . "products/filter"?>" class="d-flex flex-column">
            <div class="d-flex flex-column justify-content-between">
                <label class="form-label" for="priceRange">Price</label>
                <div class="d-flex flex-row justify-content-between gap-2 mb-2" id="priceRange">
                    <input type="number" class="form-control px-1 py-0 text-center" placeholder="From 1000" aria-label="minPrice" name="minPrice" value="<?= isset($_GET['minPrice']) ? $_GET['minPrice'] : 1000;?>">
                    <input type="number" class="form-control px-1 py-0 text-center" placeholder="To 500000" aria-label="maxPrice" name="maxPrice" value="<?= isset($_GET['maxPrice']) ? $_GET['maxPrice'] : 500000;?>">
                </div>
                <button class="btn btn-primary py-0 w-50" type="submit">Set price</button>
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
                                <input class="form-check-input" type="checkbox" value="phone" id="flexCheckPhone" name="type[]">
                                <label class="form-check-label" for="flexCheckPhone">
                                    Phones
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="laptop" id="flexCheckLaptop" name="type[]">
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
                                <input class="form-check-input" type="checkbox" value="all" id="flexCheckDefault" name="brand[]" checked>
                                <label class="form-check-label" for="flexCheckDefault">
                                    All brands
                                </label>
                            </div>
                            <?php foreach ($data['brands'] as $brand): ?>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="<?= $brand ?>" id="flexCheckDefault" name="brand[]">
                                <label class="form-check-label" for="flexCheckDefault">
                                    <?= $brand ?>
                                </label>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>

            <hr>

            <button class="btn btn-primary" type="submit">Filter</button>
        </form>
    </nav>

    <div class="col-sm-8 col-md-9 px-4 py-2">
        <p class="fs-3 fw-bold px-3">All products</p>
        <div class="row row-cols-1 row-cols-md-3 gy-4">
            <?php if (count($data['products']) == 0) : ?>
                <div class="lead">No products available !</div>
            <?php endif; ?>

            <?php foreach ($data['products'] as $product):?>
                <div class="col" onclick="location.href='<?=ROOT . "products/product/" . $product->productID?>'" style="cursor: pointer;">
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
