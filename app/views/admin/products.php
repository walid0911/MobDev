<?php $this->view("admin/header", $data); ?>


<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <h2 class="heading-section">ALL PRODUCTS</h2>
            </div>
        </div>

        <div><a href="#" class="alert-link" style="color: green"><img src="<?=ASSETS?>images/plusIcon.png" alt="Plus Icon" width="32" class="m-2">Add Product</a></div>
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
                                    <a class="alert-success" href="#">Edit</a> |
                                    <a class="alert-danger" href="#">Delete</a>
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
