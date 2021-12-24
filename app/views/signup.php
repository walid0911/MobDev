<?php $this->view("header",$data); ?>

<!--<span style="font-size:18px;color:red;">--><?php //check_error() ?><!--</span>-->

<div class="container">
    <form class="row g-3 needs-validation my-4 mx-2" method="post" novalidate>
        <div class="col-md-4">
            <label for="validationCustom01" class="form-label">First name</label>
            <input type="text" class="form-control" id="validationCustom01" name="firstName" value="<?= isset($_POST['firstName']) ? $_POST['firstName'] : '';?>" required>
            <div class="valid-feedback">
                Looks good!
            </div><!--
            <div class="invalid-feedback">
                Please provide a first name.
            </div>-->
            <?php if (isset($_SESSION['errname'])) :?>
                <div class="small text-danger">
                    Please provide a first name.
                </div>
            <?php endif; ?>
        </div>
        <div class="col-md-4">
            <label for="validationCustom02" class="form-label">Last name</label>
            <input type="text" class="form-control" id="validationCustom02" name="lastName" value="<?= isset($_POST['lastName']) ? $_POST['lastName'] : '';?>" required>
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Please provide a last name.
            </div>
        </div>
        <div class="col-md-4">
            <label for="validationCustomUsername" class="form-label">Username</label>
            <div class="input-group has-validation">
                <span class="input-group-text" id="inputGroupPrepend">@</span>
                <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="username" value="<?= isset($_POST['username']) ? $_POST['username'] : '';?>" required>
                <div class="invalid-feedback">
                    Please choose a username.
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <label for="validationCustom03" class="form-label">Email</label>
            <input type="email" class="form-control" id="validationCustom03" name="email" value="<?= isset($_POST['email']) ? $_POST['email'] : '';?>" required>
            <div class="invalid-feedback">
                Please provide a valid email.
            </div>
        </div>
        <div class="col-md-3">
            <label for="validationCustom04" class="form-label">Phone</label>
            <div class="input-group has-validation">
                <span class="input-group-text" id="inputGroupPrepend">+212</span>
                <input type="tel" class="form-control" id="validationCustom04" aria-describedby="inputGroupPrepend" name="phone" value="<?= isset($_POST['phone']) ? $_POST['phone'] : '';?>" required>
                <div class="invalid-feedback">
                    Please provide a valid phone number.
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <label for="validationCustom05" class="form-label">Password</label>
            <input type="password" class="form-control" id="validationCustom05" name="password" required>
            <div class="invalid-feedback">
                Please provide a valid password.
            </div>
        </div>
        <div class="col-12">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                <label class="form-check-label" for="invalidCheck">
                    Agree to terms and conditions
                </label>
                <div class="invalid-feedback">
                    You must agree before submitting.
                </div>
            </div>
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit">Register</button>
        </div>
    </form>

    <script type="text/javascript">
        (function () {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                    form.addEventListener('submit', function (event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }
                        form.classList.add('was-validated')
                    }, false)
                })
            })()
    </script>

    <!--<form method="post">
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

        <div class="form-floating">
            <input type="text" name="username" class="form-control" id="floatingInput" placeholder="Username" value="<?/*= isset($_POST['username']) ? $_POST['username'] : '';*/?>" required>
            <label for="floatingInput">Username</label>
        </div>
        <div class="form-floating">
            <input type="text" name="firstName" class="form-control" id="floatingInput" placeholder="First name" value="<?/*= isset($_POST['firstName']) ? $_POST['firstName'] : '';*/?>" required>
            <label for="floatingInput">First name</label>
        </div>
        <div class="form-floating">
            <input type="text" name="lastName" class="form-control" id="floatingInput" placeholder="Last name" value="<?/*= isset($_POST['lastName']) ? $_POST['lastName'] : '';*/?>" required>
            <label for="floatingInput">Last name</label>
        </div>
        <div class="form-floating">
            <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" value="<?/*= isset($_POST['email']) ? $_POST['email'] : '';*/?>" required>
            <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating">
            <input type="tel" name="phone" class="form-control" id="floatingInput" placeholder="+212 ..." value="<?/*= isset($_POST['phone']) ? $_POST['phone'] : '';*/?>" required>
            <label for="floatingInput">Phone number</label>
        </div>
        <div class="form-floating">
            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
            <label for="floatingPassword">Password</label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    </form>-->
        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    </form>
</div>
<?php $this->view("footer",$data); ?>
