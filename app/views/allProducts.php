<?php $this->view("header", $data); ?>

<div class="container-fluid d-flex flex-row">
    <nav class="container nav flex-column col-3 px-4">
        <form action="">
            <div>
                <label class="form-label" for="priceRange">Price</label>
                <div class="d-flex flex-row justify-content-between gap-2" id="priceRange">
                    <input type="number" class="form-control px-1 py-0 text-center" placeholder="From 1000" aria-label="minPrice">
                    <input type="number" class="form-control px-1 py-0 text-center" placeholder="To 50000" aria-label="maxPrice">
                </div>
            </div>

            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Brand
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                                <label class="form-check-label" for="flexCheckDefault">
                                    All marks
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
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Accordion Item #2
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Accordion Item #3
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </nav>

    <div class="container col-9 px-2">
        <p class="fs-3 fw-bold">All products</p>
        <div class="row  row-cols-1 row-cols-md-3 g-4">
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
