<?php $this->view("header", $data); ?>

    <div class="px-4 py-5 text-center text-light" id="hero-section">
        <h1 class="display-5 fw-bold">Centered hero</h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                <?php if(!isset($data['user'])):?>
                    <a href="signup"><button type="button" class="btn btn-primary btn-md px-3 gap-3">Sign up</button></a>
                <?php endif;?>
                <a><button type="button" class="btn btn-outline-light btn-md px-3">Show all products</button></a>
            </div>
        </div>
    </div>


<?php

?>

<?php $this->view("footer", $data);?>