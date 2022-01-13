<?php $this->view("admin/header", $data); ?>


<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <h2 class="heading-section">ALL PRODUCTS</h2>
            </div>
        </div>

        <div><a href="<?=ROOT?>admin/addProduct" class="alert-link" style="color: green"><img src="<?=ASSETS?>images/plusIcon.png" alt="Plus Icon" width="32" class="m-2">Add Product</a></div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-wrap">
                    <table class="table table-responsive-xl">
                        <thead>
                            <tr>
                                <th>Product id</th>
                                <th>Type</th>
                                <th>Mark</th>
                                <th>Modele</th>
                                <th>Price</th>
                                <th>Image</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($data['products'] as $product): ?>
                            <tr class="alert" role="alert">
                                <td>
                                    <?= $product->productID; ?>
                                </td>
                                <td>
                                    <?= $product->type; ?>
                                </td>
                                <td>
                                    <?= $product->mark; ?>
                                </td>
                                <td>
                                    <?= $product->model; ?>
                                </td>
                                <td>
                                    <?= $product->price; ?>
                                </td>
                                <td>
                                    <img src="<?=UPLOADS . $product->img->Attributes(); ?>" alt="mdo" width="50" height="50" class="rounded-circle m-1">
                                </td>
                                <td>
                                    <a class="alert-success btn btn-secondary" type="submit" href="<?=ROOT?>admin/editProduct/<?=$product->productID?>">Edit</a>
                                    <button class="alert-danger btn btn-primary" type="button" data-toggle="modal" data-target="#exampleModal">Delete</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>



<?php $this->view("admin/footer", $data);?>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete the selected product?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-close" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary btn-danger">Confirm</button>
            </div>
        </div>
    </div>
</div>