<?php $this->view('header', $data); $user = $data['user'];?>

<span class="alert-danger align-content-center" style="text-align: center;"><?php check_error() ?></span>
<span class="alert-success align-content-center" style="text-align: center;"><?php check_success() ?></span>
<span class="alert-info align-content-center" style="text-align: center;"><?php check_alert() ?></span>

<div class="container pb-5">
    <h1 class="pt-3 pb-2 px-3">Edit Profile</h1>
    <hr>
    <div class="row">
        <form class="form-horizontal" role="form" id="editProfileForm" method="post" enctype="multipart/form-data">
            <!-- left column -->
            <div class="col-md-3 mt-4 float-start" >
                <div class="text-center">
                    <img src="<?= UPLOADS . $user->img->Attributes();?>" class="avatar img-circle img-thumbnail isTooltip" alt="avatar">
                    <h6>Upload a different photo...</h6>
                    <input type="file" class="form-control" form="editProfileForm" name="img" accept="image/*">
                </div>
            </div>

            <div class="col-md-8  float-end">
            <h3>Personal info</h3>
                <div class="form-group">
                    <label class="col-lg-3 control-label">First name:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" value="<?= $user->firstName; ?>" name="firstName">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Last name:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" value="<?= $user->lastName; ?>" name="lastName">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Email:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" value="<?= $user->email; ?>" name="email">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Username:</label>
                    <div class="col-md-8">
                        <input class="form-control" type="text" value="<?= $user->username;?>" name="username">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Phone number:</label>
                    <div class="input-group" style="width: 565px;">
                        <span class="input-group-text" id="inputGroupPrepend">+212</span>
                        <input class="form-control" type="text" value="<?= $user->phone;?>" name="phone">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label"></label>
                    <div class="col-md-8">
                        <input type="submit" class="btn btn-primary" value="Save Changes">
                        <span></span>
                        <input type="reset" class="btn btn-default" value="Cancel">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    var password = document.getElementById("password")
        , confirm_password = document.getElementById("confirm_password");

    function validatePassword(){
        if(password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Passwords Don't Match");
        } else {
            confirm_password.setCustomValidity('');
        }
    }
    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
</script>

<?php $this->view('footer', $data);?>