<?php $this->view("header",$data); ?>

<?= "<center><h1>THIS IS THE SIGNUP PAGE!</h1></center>"?>

<span style="font-size:18px;color:red;"><?php check_error() ?></span>

<div align="center">
    <form method="post">
        <input type="text" name="username" placeholder="username" value="<?= isset($_POST['username']) ? $_POST['username'] : '';?>" required> <br>
        <input type="text" name="firstName" placeholder="First Name" value="<?= isset($_POST['firstName']) ? $_POST['firstName'] : '';?>" required> <br>
        <input type="text" name="lastName" placeholder="Last Name" value="<?= isset($_POST['lastName']) ? $_POST['lastName'] : '';?>" required> <br>
        <input type="email" name="email" placeholder="Email" value="<?= isset($_POST['email']) ? $_POST['email'] : '';?>" required> <br>
        <input type="tel" name="phone" placeholder="Phone Number" value="<?= isset($_POST['phone']) ? $_POST['phone'] : '';?>" required> <br>
        <input type="password" name="password" placeholder="Password" required> <br>
        <input type="submit" value="Submit">
    </form>
</div>
<?php $this->view("footer",$data); ?>
