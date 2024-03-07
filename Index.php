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
    <section class="">
        <div class="container">
            <?php foreach ($pokemons as $pokemon): ?>
            <div class="card">
                <img src='<?php echo $pokemon->getUrl_image()?>' alt='image de <?php echo $pokemon->getName()?>'>
                <h3 class="name"><?php echo $pokemon->getName()?></h3>
                <p class="description"><?php echo $pokemon->getDescription()?></p>
                <p class='<?php echo $pokemon->getType1()?>'>Type : <?php echo $pokemon->getType1()?></p>
                <p>Numéro : #<?php echo $pokemon->getNumber()?></p>
                <a href="delete.php?id=<?php echo $pokemon->getId();?>">
                    <button class="button">Supprimer</button>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
        <a href="create.php">
            <button class="button">Créer un Pokémon</button>
        </a>
    </section>
    

</body>
</html>