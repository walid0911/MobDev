<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title><?= $data['page_title'] ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="<?= ASSETS ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link type="text/css" rel="stylesheet" href="<?= ASSETS ?>css/style.css?<?= time(); ?>">

    <script>
        function setBodyPadding() {
            let body, header;
            body = document.body;
            header = document.getElementById("header");
            body.style.paddingTop = "" + header.offsetHeight + "px";
        }
        window.onload = setBodyPadding;
    </script>
</head>

<body class="min-vh-100 position-relative d-flex flex-column justify-content-between">
    <header class="bg-light py-3 px-2 border-bottom" id="header">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

                <div>
                    <a class="text-decoration-none link-danger fs-5 me-3" href="<?= ROOT ?>home">EcommerceXML</a>
                </div>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="<?= ROOT ?>home" class="nav-link px-2 link-secondary">Home</a></li>
                    <li><a href="#" class="nav-link px-2 link-dark">Products</a></li>
                    <li><a href="#" class="nav-link px-2 link-dark">Catalogs</a></li>
                    <li><a href="#" class="nav-link px-2 link-dark">Contact</a></li>
                </ul>

                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                    <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
                </form>
                <?php if(!isset($data['user'])): ?>
                <ul class="nav col-12 col-lg-2 mb-2 justify-content-center mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link px-2 link-primary" href="<?= ROOT ?>login">Login</a>
                    </li>
                    <li>
                        <a class="nav-link px-2 link-secondary" href="<?= ROOT ?>signup">Register</a>
                    </li>
                </ul>
                <?php endif;?>
                <?php if(isset($data['user']) && (string)$data['user']->Attributes() == 'admin'): ?>
                    <a class="nav-link link-primary text-success" href="<?= ROOT ?>admin">Admin Section</a>
                <?php endif;?>

                <?php if(isset($data['user'])): ?>
                    <a class="link-dark text-decoration-none mx-2 position-relative" href="#"><i class="fas fa-shopping-cart"></i><span class="position-absolute top-0 start-100 translate-middle badge border border-light rounded-circle bg-danger pb-1" style="font-size: 8px;">0</span></a>
                    <div class="dropdown text-end">
                        <a href="#" class="d-flex flex-row justify-content-end align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="true">
                            <img src="<?=UPLOADS . $data['user']->img->Attributes(); ?>" alt="mdo" width="32" height="32" class="rounded-circle m-1">
                            <div class="m-1"> <?= $data['user']->username ?></div>
                        </a>

                        <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="<?= ROOT ?>logout">Logout</a></li>
                        </ul>
                    </div>
                <?php endif;?>
            </div>
        </div>
    </header>