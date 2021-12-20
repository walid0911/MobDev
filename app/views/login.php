<?php $this->view("header",$data); ?>

    <?= "<center><h1>THIS IS THE LOGIN PAGE!</h1></center>"?>

<span style="font-size:18px;color:red;"><?php check_error() ?></span>

<div align="center">
    <form method="post">
        <input type="text" name="email" placeholder="email" value="<?= isset($_POST['email']) ? $_POST['email'] : '';?>" required> <br>
        <input type="password" name="password" placeholder="Password" required> <br>
        <input type="submit" value="Submit">
    </form>
</div>

<?php $this->view("footer",$data); ?>
