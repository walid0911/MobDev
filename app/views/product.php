<?php $this->view("header", $data); ?>

<div class="container">
    <img src="<?=UPLOADS . $data["product"]->img->Attributes()?>" width="300">
</div>

    <strong>Product Type :</strong> <?= $data["product"]->type; ?> <br>
    <strong>Mark & Model :</strong> <?= $data["product"]->mark . " " . $data['product']->model; ?> <br>
    <strong>CPU :</strong> <?= $data["product"]->cpu;  ?> <br>
    <strong>GPU :</strong> <?= $data["product"]->gpu; ?> <br>
    <strong>RAM :</strong> <?= $data["product"]->ram; ?> <br>
    <strong>Storage :</strong> <?= $data["product"]->storage; ?> <br>
    <strong>Camera :</strong> <?= $data["product"]->camera; ?> <br>
    <strong>Size :</strong> <?= $data["product"]->size . " inches"; ?> <br>
    <strong>Description :</strong> <?= $data["product"]->description; ?> <br>
    <strong>Price :</strong> <?= $data["product"]->price . "DH"; ?> <br>


<?php $this->view("footer", $data);?>