<?php $this->view("header", $data);?>



<div class="container-fluid position-relative" id="hero-section">
    <div class="px-4 py-5 text-center text-light">
        <h1 class="display-5 fw-bold">Centered hero</h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                <?php if(!isset($data['user'])):?>
                    <a href="<?= ROOT . "signup"?> "><button type="button" class="btn btn-primary btn-md px-3 gap-3">Sign up</button></a>
                <?php endif;?>
                <a href="<?= ROOT . "products" ?>"><button type="button" class="btn btn-outline-light btn-md px-3">Show all products</button></a>
            </div>
        </div>
    </div>
</div>


    <div class="container position-relative mt-5">
        <nav>
            <div class="nav nav-tabs mb-3 justify-content-center" id="nav-tab" role="tablist">
                <?php if(isset($data['laptops'])): ?>
                    <button class="nav-link active mx-2" id="nav-laptops-tab" data-bs-toggle="tab" data-bs-target="#nav-laptops" type="button" role="tab" aria-controls="nav-laptops" aria-selected="true">Laptops</button>
                <?php endif; ?>
                <?php if(isset($data['phones'])): ?>
                    <button class="nav-link <?= !isset($data['laptops'])? 'active' : '' ?> mx-2" id="nav-phones-tab" data-bs-toggle="tab" data-bs-target="#nav-phones" type="button" role="tab" aria-controls="nav-phones" aria-selected="false">Phones</button>
                <?php endif; ?>
            </div>
        </nav>

        <div class="tab-content" id="nav-tabContent">
            <!--Laptops-->
            <?php if(isset($data['laptops'])): ?>
            <div class="tab-pane fade show active" id="nav-laptops" role="tabpanel" aria-labelledby="nav-laptops-tab">
                <div class="row  row-cols-1 row-cols-md-4 g-4 mb-3">

                    <?php foreach ($data['laptops'] as $laptop): ?>
                        <div class="col">
                            <div class="card h-100">
                                <img src="<?= UPLOADS . $laptop->img->attributes();?>" alt="<?= $laptop->mark . " " . $laptop->model; ?>" class="card_img">
                                <div class="card-body d-flex flex-column justify-content-between">
                                    <h5 class="card-title"><?= $laptop->mark . " " . $laptop->model;?></h5>
                                    <div class="card-text small">
                                        <p>
                                            <strong>CPU :</strong> <?= $laptop->cpu; ?> <br>
                                            <strong>GPU :</strong> <?= $laptop->gpu; ?> <br>
                                            <strong>RAM :</strong> <?= $laptop->ram; ?> <br>
                                        </p>
                                    </div>
                                    <a href="<?= ROOT. "products/product/" . $laptop->productID; ?>" class="text-decoration-none link-info">Click for more info ...</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;?>
                    <a href="<?=ROOT . "products"?>" class="col link-primary text-decoration-none align-self-center text-center">See all products</a>
                </div>
            </div>
            <?php endif; ?>

            <!--Phones-->
            <?php if(isset($data['phones'])): ?>
                <div class="tab-pane fade <?= (!isset($data['laptops'])) ?'show active' : ''; ?>" id="nav-phones" role="tabpanel" aria-labelledby="nav-phones-tab">
                    <div class="row  row-cols-1 row-cols-md-4 g-4 mb-3">
                        <?php foreach ($data['phones'] as $phone): ?>
                            <div class="col">
                                <div class="card ">
                                    <img src="<?= UPLOADS . $phone->img->attributes() ?>" alt="<?= $phone->mark . " " . $phone->model; ?>" class="card_img">
                                    <div class="card-body d-flex flex-column justify-content-between">
                                        <h5 class="card-title"> <?= $phone->mark . " " . $phone->model; ?></h5>
                                        <div class="card-text small">
                                            <p>
                                                <strong>CPU :</strong> <?= $phone->cpu;  ?> <br>
                                                <strong>GPU :</strong> <?= $phone->gpu; ?> <br>
                                                <strong>RAM :</strong> <?= $phone->ram; ?> <br>
                                            </p>
                                        </div>
                                        <a href="<?=ROOT . "products/product/" . $phone->productID;?>" class="text-decoration-none link-info">Click for more info ...</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach;?>
                        <a href="<?=ROOT . "products"?>" class="col link-primary text-decoration-none align-self-center text-center">See all products</a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>




<?php $this->view("footer", $data);?>