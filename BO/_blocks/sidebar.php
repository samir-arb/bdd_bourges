<?php

$id_user = $_SESSION['auth']->id_user;

$selectUser = $db->prepare('SELECT * FROM users
    NATURAL JOIN roles
    WHERE id_user = ?
');

$selectUser->execute([$id_user]);
$user = $selectUser->fetch(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Admin Dashboard</title>
    <link rel="stylesheet" href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/assets/_styles/generic.css">
    <link rel="stylesheet" href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/assets/_styles/style.css">
    <link rel="stylesheet" href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/assets/_styles/forme.css">
    <link rel="stylesheet" href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/assets/_styles/form.css">

    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
</head>

<body>
    <input type="checkbox" id="menu_toggle"> <!--Menu Burger-->
    <div class="sidebar"><!--Menu latéral-->
        <div class="side_header justifyCenter alignCenter">
            <h3>Modern</h3> <!--Ligne correct : <h3>M<span>odern</span></h3> Mais n'étais pas utile dans le TP-->
        </div>
        <div class="side_content"> <!--Navbarre latéral-->
            <div class="profile textCenter">
                <div class="profile_img bg_img"></div>
                <h4 class="capitalize"><?php echo ucfirst($user->user_firstname) ?> <?php echo ucfirst($user->user_name); ?></h4>
                <small class="capitalize"><?php echo $user->role_name ?></small>
            </div>
            <div class="side_menu">
                <ul class="textCenter">
                    <li>
                        <a href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/bo/index.php?zone=dashboard" class="<?php if (isset($_GET["zone"]) && $_GET["zone"] == "dashboard") {
                                                                                                            echo "active";
                                                                                                        } ?>">
                            <span class="las la-home textCenter"></span>
                            <small class="capitalize">Dashboard</small>
                        </a>
                    </li>
                    <li>
                        <a href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/BO/_views/abonnes.php?zone=abonnes" class="<?php if (isset($_GET["zone"]) && $_GET["zone"] == "abonnes") {
                                                                                                                    echo "active";
                                                                                                                } ?>">
                            <span class="las la-user-alt textCenter"></span>
                            <small class="capitalize">Abonnés</small>
                        </a>
                    </li>
                    <li>
                        <a href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/BO/_views/auteurs.php?zone=auteurs" class="<?php if (isset($_GET["zone"]) && $_GET["zone"] == "auteurs") {
                                                                                                                    echo "active";
                                                                                                                } ?>">
                            <span class="las la-envelope textCenter"></span>
                            <small class="capitalize">Auteurs</small>
                        </a>
                    </li>
                    <li>
                        <a href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/BO/_views/livres.php?zone=livres" class="<?php if (isset($_GET["zone"]) && $_GET["zone"] == "livres") {
                                                                                                                    echo "active";
                                                                                                                } ?>">
                            <span class="las la-clipboard-list textCenter"></span>
                            <small class="capitalize">Livres</small>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="las la-shopping-cart textCenter"></span>
                            <small class="capitalize">Orders</small>
                        </a>
                    </li>
                    <?php
                    if (isset($_SESSION['auth']) && $_SESSION['auth']->role_level > 99) {
                    ?>
                        <li>
                            <a href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/bo/_views/admin.php?zone=admin" class="<?php if (isset($_GET["zone"]) && $_GET["zone"] == "admin") {
                                                                                                                    echo "active";
                                                                                                                } ?>">
                                <span class="las la-tasks textCenter"></span>
                                <small class="capitalize">admin</small>
                            </a>
                        </li>

                    <?php
                    }
                    ?>

                </ul>
            </div>
        </div>
    </div>