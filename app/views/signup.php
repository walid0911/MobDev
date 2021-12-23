<?php $this->view("header",$data); ?>

<span style="font-size:18px;color:red;"><?php check_error() ?></span>

<div class="form-signin my-5">
    <form method="post">
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

        <div class="form-floating">
            <input type="text" name="username" class="form-control" id="floatingInput" placeholder="Username" value="<?= isset($_POST['username']) ? $_POST['username'] : '';?>" required>
            <label for="floatingInput">Username</label>
        </div>
        <div class="form-floating">
            <input type="text" name="firstName" class="form-control" id="floatingInput" placeholder="First name" value="<?= isset($_POST['firstName']) ? $_POST['firstName'] : '';?>" required>
            <label for="floatingInput">First name</label>
        </div>
        <div class="form-floating">
            <input type="text" name="lastName" class="form-control" id="floatingInput" placeholder="Last name" value="<?= isset($_POST['lastName']) ? $_POST['lastName'] : '';?>" required>
            <label for="floatingInput">Last name</label>
        </div>
        <div class="form-floating">
            <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" value="<?= isset($_POST['email']) ? $_POST['email'] : '';?>" required>
            <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating">
            <input type="tel" name="phone" class="form-control" id="floatingInput" placeholder="+212 ..." value="<?= isset($_POST['phone']) ? $_POST['phone'] : '';?>" required>
            <label for="floatingInput">Phone number</label>
        </div>
        <div class="form-floating">
            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
            <label for="floatingPassword">Password</label>
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign up</button>
    </form>
</div>
<?php $this->view("footer",$data); ?>
