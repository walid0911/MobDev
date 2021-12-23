<?php $this->view("header", $data); ?>


<?php foreach ($data['products'] as $product):?>

<div class="row  row-cols-1 row-cols-md-4 g-4 mb-3">
    <div class="col">
        <div class="card ">
            <img src="<?= UPLOADS . $product->img->Attributes()?>" alt="phone1" class="card_img">
            <div class="card-body">
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
</div>

<?php endforeach; ?>


<?php $this->view("footer", $data);?>
