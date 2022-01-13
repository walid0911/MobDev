    <?php $this->view("admin/header", $data); $product = $data["product"];?>


    <span class="alert-danger align-content-center" style="text-align: center;"><?php check_error() ?></span>
    <span class="alert-success align-content-center" style="text-align: center;"><?php check_success() ?></span>
    <span class="alert-info align-content-center" style="text-align: center;"><?php check_alert() ?></span>

    <div class="card shadow mb-3">
        <div class="card-header py-3">
            <p class="text-primary m-0 fw-bold h2">Product Update</p>
        </div>
        <div class="card-body">
            <form method="post">
                <div class="row">
                    <div class="col">
                        <img src="<?= UPLOADS . $product->img->Attributes();?>" class="avatar img-circle img-thumbnail isTooltip" style="border: black solid 2px; width: 347px; height: 264px">
                        <h6>Upload a photo...</h6>
                        <input type="file" class="form-control" form="editProfileForm" name="img" accept="image/*">
                    </div>
                    <div class="col">
                        <div class="mb-3"><label class="form-label" for="username"><strong>ProductID</strong></label><input class="form-control" type="text" name="productId" value="<?=$product->productID?>"/></div>
                        <div class="mb-xl-3 mt-5"><label class="form-label" for="username"><strong>Type</strong></label>
                            <select name="type">
                                <option value="<?=$product->type?>"><?=$product->type?></option>
                                <?php $otherOption = $product->type == "phone"? "laptop" : "phone"?>
                                <option value="<?=$otherOption?>"><?=$otherOption?></option>
                            </select>
                        </div>
                        <div class="mb-3"><label class="form-label" for="username"><strong>Mark</strong></label><input class="form-control" type="text" name="mark" value="<?=$product->mark?>"/></div>
                        <div class="mb-3"><label class="form-label" for="username"><strong>Model</strong></label><input class="form-control" type="text"  name="model" value="<?=$product->model?>"/></div>
                    </div>
                    <div class="col">
                        <div class="mb-3"><label class="form-label" for="username"><strong>CPU</strong></label><input  class="form-control" type="text"  name="cpu" value="<?=$product->cpu?>"/></div>
                        <div class="mb-3"><label class="form-label" for="username"><strong>Ram</strong></label><input  class="form-control" type="text"  name="ram" value="<?=$product->ram?>"/></div>
                        <div class="mb-3"><label class="form-label" for="username"><strong>Storage</strong></label><input  class="form-control" type="text"  name="storage" value="<?=$product->storage?>"/></div>
                        <div class="mb-3"><label class="form-label" for="username"><strong>Gpu</strong></label><input  class="form-control" type="text"  name="gpu" value="<?=$product->gpu?>"/></div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="mb-3"><label class="form-label" for="username"><strong>Size</strong></label><input class="form-control" type="text" name="size" value="<?=$product->size?>"/></div>
                    </div>
                    <div class="col">
                        <div class="mb-3"><label class="form-label" for="username"><strong>Camera</strong></label><input class="form-control" type="text" name="camera" value="<?=$product->camera?>"/></div>
                    </div>
                    <div class="col">
                        <div class="mb-3"><label class="form-label" for="username"><strong>Price</strong></label><input class="form-control" type="text" name="price" value="<?=$product->price?>"/></div>
                    </div>
                </div>

                <div class="row">

                    <div class="col">
                        <div class="mb-3"><label class="form-label" for="last_name"><strong>Description</strong></label><textarea id="last_name" class="form-control" type="text" name="description"><?=$product->description?></textarea></div>
                    </div>
                </div>
                <div class="mb-3"><button class="btn btn-primary btn-sm" type="submit">Save Settings</button></div>
            </form>
        </div>
    </div>

    <?php $this->view("admin/footer", $data);?>

