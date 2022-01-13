<?php $this->view("admin/header",$data); ?>

    <span class="alert-danger align-content-center" style="text-align: center;"><?php check_error() ?></span>

    <!------ Include the above in your HEAD tag ---------->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div style="padding: 40px 15px;text-align: center;">
                    <h1>
                        Oops!</h1>
                    <h2>
                        404 Not Found</h2>
                    <div class="error-details">
                        Sorry, an error has occured, Requested page not found!
                    </div>
                    <div style="margin-top:15px;margin-bottom:15px;">
                        <a href="<?= ROOT?> home" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-home"></span>
                            Take Me Home </a><a href="#" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-envelope"></span> Contact Support </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php $this->view("admin/footer",$data); ?>