<?php $this->view("header", $data); $user = $data['user']?>

<div class="container bootstrap snippets bootdey mt-5 mb-5 ">
    <div class="panel-body inf-content">
        <div class="row">
            <div class="col-md-4">
                <img style="width:600px;" class="img-circle img-thumbnail isTooltip" src="<?= UPLOADS . $user->img->Attributes();?>">
            </div>
            <div class="col-md-6 p-3">
                <div class="table-responsive">
                    <table class="table table-user-information">
                        <tbody>
                        <tr>
                            <td>
                                <strong>
                                    <span class="glyphicon glyphicon-asterisk text-primary"></span>
                                    Identificacion
                                </strong>
                            </td>
                            <td class="text-primary">
                                <?= $user->userID;?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>
                                    <span class="glyphicon glyphicon-user  text-primary"></span>
                                    First Name
                                </strong>
                            </td>
                            <td class="text-primary">
                                <?= $user->firstName;?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>
                                    <span class="glyphicon glyphicon-cloud text-primary"></span>
                                    Last Name
                                </strong>
                            </td>
                            <td class="text-primary">
                                <?= $user->lastName;?>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <strong>
                                    <span class="glyphicon glyphicon-bookmark text-primary"></span>
                                    Username
                                </strong>
                            </td>
                            <td class="text-primary">
                                <?= $user->username;?>
                            </td>
                        </tr>


                        <tr>
                            <td>
                                <strong>
                                    <span class="glyphicon glyphicon-eye-open text-primary"></span>
                                    Role
                                </strong>
                            </td>
                            <td class="text-primary">
                                <?= $user->Attributes();?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>
                                    <span class="glyphicon glyphicon-envelope text-primary"></span>
                                    Email
                                </strong>
                            </td>
                            <td class="text-primary">
                                <?= $user->email;?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>
                                    <span class="glyphicon glyphicon-calendar text-primary"></span>
                                    Phone Number
                                </strong>
                            </td>
                            <td class="text-primary">
                                <?= "+212" . $user->phone;?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>
                                    <span class="glyphicon glyphicon-calendar text-primary"></span>
                                    Created
                                </strong>
                            </td>
                            <td class="text-primary">
                                <?php
                                    $createdAt = explode('T',$user->createdAt);
                                    echo $createdAt[0] . " " . $createdAt[1];
                                ?>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    <a href="#"><button type="button" class="btn btn-outline-danger float-lg-end noBtnTransition">Edit Profile</button></a>
                    <a href="<?= ROOT?>profile/customerCard"><button type="button" class="btn btn-outline-success noBtnTransition">Generate Customer Card</button></a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->view("footer", $data); ?>
