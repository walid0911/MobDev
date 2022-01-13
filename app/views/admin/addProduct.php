<?php $this->view("admin/header", $data);?>


<span class="alert-danger align-content-center" style="text-align: center;"><?php check_error() ?></span>
<span class="alert-success align-content-center" style="text-align: center;"><?php check_success() ?></span>
<span class="alert-info align-content-center" style="text-align: center;"><?php check_alert() ?></span>

<div class="card shadow mb-3">
    <div class="card-header py-3">
        <p class="text-primary m-0 fw-bold h2">Add Product</p>
    </div>
    <div class="card-body">
        <form method="post" action="#">
            <div class="row">
                <div class="col">
                    <img src="" class="avatar img-circle img-thumbnail isTooltip" style="border: black solid 2px; width: 347px; height: 264px">
                    <h6>Upload a photo...</h6>
                    <input type="file" class="form-control" form="editProfileForm" name="img" accept="image/*">
                </div>
                <div class="col">
                    <div class="mb-3"><label class="form-label" for="username"><strong>ProductID</strong></label><input class="form-control" type="text" name="productId"/></div>
                    <div class="mb-xl-3 mt-5"><label class="form-label" for="username"><strong>Type</strong></label>
                        <select name="type">
                            <option value="phone>">phone</option>
                            <option value="laptop">laptop</option>
                        </select>
                    </div>
                    <div class="mb-3"><label class="form-label" for="username"><strong>Mark</strong></label><input class="form-control" type="text" name="mark" v/></div>
                    <div class="mb-3"><label class="form-label" for="username"><strong>Model</strong></label><input class="form-control" type="text"  name="model" /></div>
                </div>
                <div class="col">
                    <div class="mb-3"><label class="form-label" for="username"><strong>CPU</strong></label><input  class="form-control" type="text"  name="cpu" /></div>
                    <div class="mb-3"><label class="form-label" for="username"><strong>Ram</strong></label><input  class="form-control" type="text"  name="ram" /></div>
                    <div class="mb-3"><label class="form-label" for="username"><strong>Storage</strong></label><input  class="form-control" type="text"  name="storage" /></div>
                    <div class="mb-3"><label class="form-label" for="username"><strong>Gpu</strong></label><input  class="form-control" type="text"  name="gpu"/></div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="mb-3"><label class="form-label" for="username"><strong>Size</strong></label><input class="form-control" type="text" name="size" /></div>
                </div>
                <div class="col">
                    <div class="mb-3"><label class="form-label" for="username"><strong>Camera</strong></label><input class="form-control" type="text" name="camera" /></div>
                </div>
                <div class="col">
                    <div class="mb-3"><label class="form-label" for="username"><strong>Price</strong></label><input class="form-control" type="text" name="price" /></div>
                </div>
            </div>

            <div class="row">

                <div class="col">
                    <div class="mb-3"><label class="form-label" for="last_name"><strong>Description</strong></label><textarea id="last_name" class="form-control" type="text" name="description"></textarea></div>
                </div>
            </div>
            <div class="mb-3"><button class="btn btn-primary btn-sm" type="submit">Add Product</button></div>
        </form>
    </div>
</div>

<?php $this->view("admin/footer", $data);?>

