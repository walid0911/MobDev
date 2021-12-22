<?php $this->view("header",$data); ?>

<span style="font-size:18px;color:red;"><?php check_error() ?></span>

<div class="form-signin my-3">
    <form method="post">
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

        <div class="form-floating">
            <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" value="<?= isset($_POST['email']) ? $_POST['email'] : '';?>" required>
            <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating">
            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
            <label for="floatingPassword">Password</label>
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
    </form>
</div>

<?php $this->view("footer",$data); ?>
