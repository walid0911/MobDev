<?php $this->view("header",$data); ?>

    <?= "<center><h1>ERROR 404</h1></center>"?>
    <span style="font-size:18px;color:red;"><?php check_error() ?></span>

<?php $this->view("footer",$data); ?>