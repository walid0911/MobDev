<?php $this->view("header",$data); ?>

<span class="alert-danger align-content-center" style="text-align: center;"><?php check_error() ?></span>
<span class="alert-success align-content-center" style="text-align: center;"><?php check_success() ?></span>

<div class="form-signin">
    <form method="post">
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

        <div class="form-floating">
            <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" value="<?= isset($_POST['email']) ? $_POST['email'] : '';?>" required>
            <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating">
            <input type="password" name="password" minlength="4" class="form-control" id="floatingPassword" placeholder="Password" required>
            <label for="floatingPassword">Password</label>
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
    </form>
</div>

<?php $this->view("footer",$data); ?>
