<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php $_SERVER['DOCUMENT_ROOT']?>/assets/_styles/generic.css">
    <link rel="stylesheet" href="<?php $_SERVER['DOCUMENT_ROOT']?>/assets/_styles/style.css">
    <link rel= "stylesheet" href= "https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" >
    <title>Modern Admin Dashboard</title>
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
                <h4 class="capitalize">samir abien</h4>
                <small class="capitalize">art director</small>
            </div>
            <div class="side_menu">
                <ul class="textCenter">
                    <li>
                        <a href="<?php $_SERVER['DOCUMENT_ROOT']?>/bo/index.php?zone=dashboard" class="<?php if(isset($_GET["zone"]) && $_GET["zone"] == "dashboard"){echo "active";} ?>">
                            <span class="las la-home textCenter"></span>
                            <small class="capitalize">Dashboard</small>
                        </a>
                    </li>
                    <li>
                        <a href="<?php $_SERVER['DOCUMENT_ROOT']?>/BO/_views/abonnes.php?zone=abonnes" class="<?php if(isset($_GET["zone"]) && $_GET["zone"] == "abonnes"){echo "active";} ?>">
                            <span class="las la-user-alt textCenter"></span>
                            <small class="capitalize">Abonnés</small>
                        </a>
                    </li>
                    <li>
                        <a href="<?php $_SERVER['DOCUMENT_ROOT']?>/BO/_views/auteurs.php?zone=auteurs"class="<?php if(isset($_GET["zone"]) && $_GET["zone"] == "auteurs"){echo "active";} ?>">
                            <span class="las la-envelope textCenter"></span>
                            <small class="capitalize">Auteurs</small>
                        </a>
                    </li>
                    <li>
                        <a href="<?php $_SERVER['DOCUMENT_ROOT']?>/BO/_views/livres.php?zone=livres"class="<?php if(isset($_GET["zone"]) && $_GET["zone"] == "livres"){echo "active";} ?>">
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
                    <li>
                        <a href="#">
                            <span class="las la-tasks textCenter"></span>
                            <small class="capitalize">Tasks</small>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>