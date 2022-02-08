<?php $this->view("header", $data); ?>
    <main class="p-5">
        <div class="row g-5">
            <div class="col-md-6 col-lg-5 order-md-last">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-primary">Your cart</span>
                    <span class="badge bg-primary rounded-pill"><?= isset($_SESSION['counter']) ?   $_SESSION['counter'] : 0; ?></span>
                </h4>
                <ul class="list-group mb-3">
                    <?php if(isset($_SESSION['counter']) && $_SESSION['counter'] > 0)
                    {
                        foreach ($_SESSION['cart'] as $item) { ?>
                    <li class="list-group-item d-flex justify-content-between lh-sm">
                        <div>
                            <h6 class="my-0"><?= $item[0][1] . " " . $item[0][2]; ?></h6>
                            <small class="text-muted">Quantity : <?= $item[1]; ?></small>
                        </div>
                        <div>
                            <span class="text-muted">Unit : <?= $item[0][3] . " MAD" ?></span><br>
                            <span class="text-muted">All : <?= ($item[0][3] * $item[1]) . " MAD"?></span>
                        </div>
                    </li>
                    <?php }
                    } else { ?>
                        <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                                <h6 class="my-0">Shopping cart is empty !</h6>
                            </div>
                        </li>
                    <?php } ?>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (MAD)</span>
                        <strong><?= (isset($_SESSION['total']) ?   $_SESSION['total'] : 0) . " MAD" ?></strong>
                    </li>
                </ul>
            </div>
            <div class="col-md-6 col-lg-7">
                <h4 class="mb-3">Billing address</h4>
                <form class="needs-validation" method="post" action="<?= (isset($_SESSION['counter']) && $_SESSION['counter'] > 0) ? (ROOT . "checkout/generateFacture") : "" ?>" novalidate>
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label for="firstName" class="form-label">First name<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label for="lastName" class="form-label">Last name<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                            <div class="invalid-feedback">
                                Valid last name is required.
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="email" class="form-label">Email <span class="text-muted">(Optional)</span></label>
                            <input type="email" class="form-control" id="email" placeholder="you@example.com">
                            <div class="invalid-feedback">
                                Please enter a valid email address for shipping updates.
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="address" class="form-label">Address<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
                            <div class="invalid-feedback">
                                Please enter your shipping address.
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="address2" class="form-label">Address 2 <span class="text-muted">(Optional)</span></label>
                            <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
                        </div>

                        <div class="col-md-5">
                            <label for="country" class="form-label">Country<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="country" placeholder="Country">
                            <div class="invalid-feedback">
                                Please select a valid country.
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label for="state" class="form-label">State<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="state" placeholder="State">
                            <div class="invalid-feedback">
                                Please provide a valid state.
                            </div>
                        </div>

                        <div class="col-md-3">
                            <label for="zip" class="form-label">Zip<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="zip" placeholder="" required>
                            <div class="invalid-feedback">
                                Zip code required.
                            </div>
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="same-address">
                        <label class="form-check-label" for="same-address">Shipping address is the same as my billing address</label>
                    </div>

                    <hr class="my-4">

                    <h4 class="mb-3">Payment</h4>

                    <div class="my-3">
                        <div class="form-check">
                            <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked required>
                            <label class="form-check-label" for="credit">Credit card<span class="text-danger">*</span</label>
                        </div>
                    </div>

                    <div class="row gy-3">
                        <div class="col-md-6">
                            <label for="cc-name" class="form-label">Name on card<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="cc-name" placeholder="" required>
                            <small class="text-muted">Full name as displayed on card</small>
                            <div class="invalid-feedback">
                                Name on card is required
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="cc-number" class="form-label">Credit card number<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="cc-number" placeholder="" required>
                            <div class="invalid-feedback">
                                Credit card number is required
                            </div>
                        </div>

                        <div class="col-md-3">
                            <label for="cc-expiration" class="form-label">Expiration<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
                            <div class="invalid-feedback">
                                Expiration date required
                            </div>
                        </div>

                        <div class="col-md-3">
                            <label for="cc-cvv" class="form-label">CVV<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                            <div class="invalid-feedback">
                                Security code required
                            </div>
                        </div>
                    </div>

                    <hr class="my-4">

                    <button class="w-100 btn btn-primary btn-lg" type="submit">Validate payement</button>
                </form>
            </div>
        </div>
    </main>
<?php $this->view('footer', $data);?>