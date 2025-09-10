<?php
// Valeurs par défaut si la page appelante n’a rien défini
$domaine     = $domaine     ?? 'Dashboard';
$sousDomaine = $sousDomaine ?? ucfirst(pathinfo($_SERVER['SCRIPT_NAME'], PATHINFO_FILENAME));
?>


<main><!--Partie au dessus du tableau-->
    <div class="page_header"><!--Titre-->
        <h1><?php echo $domaine ?></h1>
        <small><?php echo $sousDomaine ?></small>
    </div>
    <div class="page_content"><!--Statiques génrérales du tableau-->