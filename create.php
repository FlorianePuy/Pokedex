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
    <a href="Index.php">
        <div class="logo-pokeball">
        </div>
    </a>
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
<section class="container">
    <fieldset class="container">
        <form class="form">
            <label for="number">Numéro : 
                <input type="number" name="number" id="number" placeholder="25" min="1" max="151" required>
            </label>
            <label for="name">Nom :
                <input type="text" name="name" id="name" placeholder="Pikachu" required>
            </label>
            <label for="description">Description :
                <textarea name="description" id="description" rows="6" cols="40"> description du pokemon...
                </textarea>
            </label>
            <!-- <label for="type1">Type :
                <select>
                   <option value="fire">Feu</option>
                </select>
            </label>
            <label for="type2">Type secondaire :
                <select>
                    <option value="ground">Sol</option>
                </select>
            </label> -->
            <label for="url_image">Lien vers l'image :
                <input type="url" name="url_image" id="url_image" placeholder="https://example.com" pattern="https://
                .*" 
                       size="300" required />
            </label>  
            <input class="button" type="submit" name="submit" id="submit">
        </form>
    </fieldset>
</section>
</body>
</html>