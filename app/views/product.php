<?php $this->view("header", $data); ?>

<div class="container-fluid py-4 px-sm-5 my-4 row row-cols-1 row-cols-sm-2 gx-sm-5 align-items-center">
    <div class="container d-flex align-items-center justify-content-center mb-2 position-relative" id="img_product">
        <img class="position-absolute w-100 h-100" src="<?=UPLOADS . $data["product"]->img->Attributes()?>" alt="">
        <div class="position-absolute w-100 h-100 shadow" id="shadow"></div>
    </div>

    <div class="container mt-3 mt-sm-0">
        <div class="display-5 text-secondary"><?= $data["product"]->mark . " " . $data['product']->model; ?></div>
        <div class="fw-bold text-secondary small">
            CPU : <span class="fw-normal text-primary"><?= $data["product"]->cpu; ?></span>
        </div>
        <div class="fw-bold text-secondary small">
            GPU : <span class="fw-normal text-primary"><?= $data["product"]->gpu; ?></span>
        </div>
        <div class="fw-bold text-secondary small">
            RAM : <span class="fw-normal text-primary"><?= $data["product"]->ram; ?></span>
        </div>
        <div class="fw-bold text-secondary small">
            Storage : <span class="fw-normal text-primary"><?= $data["product"]->storage; ?></span>
        </div>
        <div class="fw-bold text-secondary small">
            Camera : <span class="fw-normal text-primary"><?= $data["product"]->camera; ?></span>
        </div>
        <div class="fw-bold text-secondary small">
            Display : <span class="fw-normal text-primary"><?= $data["product"]->size . " inches"; ?></span>
        </div>
        <div class="small">
            <span class="fw-light text-primary"><?= $data["product"]->description; ?></span>
        </div>

        <form method="get" action="<?= ROOT . "checkout/add_to_cart" ?>" class="mt-4">
            <div class="input-group">
                <input type="number" name="quantity" class="form-control" placeholder="Quantite to buy" min="1" required>
                <input type="hidden" name="id" value="<?= $data["product"]->productID; ?>">
                <button class="btn btn-primary">BUY for <?= $data["product"]->price . " MAD"; ?></button>
            </div>
        </form>
    </div>
</div>

<?php $this->view("footer", $data);?>