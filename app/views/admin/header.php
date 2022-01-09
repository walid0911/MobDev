<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?=  $data['page_title'] ?> </title>
    <link type="text/css" rel="stylesheet" href="<?= ASSETS ?>css/buff.css?<?= time(); ?>">
</head>

<body class="app">

<header class="app-header">

    <a href="<?=ROOT?>admin" class="app-header__logo">Admin section</a>

    <a class="app-sidebar__toggle" href="<?= ROOT ?>home">Back to Website</a>
    <ul class="app-nav">

        <li class="app-search">
            <input class="app-search__input" type="search" placeholder="search">
            <button class="app-search__button"><i class="fa fa-search"></i></button>
        </li>
        <div class="text-end">
            <a class="d-flex flex-row justify-content-end align-items-center link-dark text-decoration-none dropdown-toggle mt-1" href="#" data-toggle="dropdown" aria-label="Open Menu">
                <img src="<?=UPLOADS . $data['user']->img->Attributes(); ?>" alt="mdo" width="32" height="32" class="rounded-circle m-1">
                <div class="m-1"> <?= $data['user']->username ?></div>
            </a>

            <ul class="dropdown-menu settings-menu dropdown-menu-right">
                <li><a class="dropdown-item" href="#"><i class="fa fa-cog"></i> Settings</a></li>
                <li><a class="dropdown-item" href="#"><i class="fa fa-user"></i> Profile</a></li>
                <li><a class="dropdown-item" href="<?=ROOT?>logout"><i class="fa fa-sign-out-alt"></i> Logout</a></li>
            </ul>
        </div>

        <li>

        </li>
    </ul>

</header>
<body>
<main class="app-content">