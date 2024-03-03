<!doctype html>
<html lang="fr-FR">
<head>
    <meta charset="utf-8">
    <title>Pokédex</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
</head>
<body>
<nav>
    <div class="logo-pokeball">
    </div>
    <form action="">
        <input id="search" name="search" type="search" placeholder="Recherche...">
        <button type="submit">Rechercher</button>
    </form>
</nav>
<?php
require 'PokemonsManager.php';
require 'Pokemon.php';
require 'Type.php';

$manager=New PokemonsManager();
$pokemons=$manager->getAll();
?>



</body>
</html>