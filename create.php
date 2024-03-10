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
        <label for="search"></label><input id="search" name="search" type="search" placeholder="Recherche...">
        <button type="submit">Rechercher</button>
    </form>
</nav>
<?php
require 'PokemonsManager.php';
require 'Pokemon.php';
require 'Type.php';
require 'TypesManager.php';

$PokemonManager = New PokemonsManager();
$typeManager = New TypesManager();
$types = $typeManager->getAll();

if (!empty($_POST)){
    $number=intval($_POST['number']);
    $name=$_POST['name'];
    $description=$_POST['description'];
    $type1=$_POST['type1'];
    if (!empty($_POST['type2'])){
        $type2=$_POST['type2'];
    }else{
        $type2=null;
    }
    $url_image=$_POST['url_image'];
    $newPokemon = new Pokemon([
            'number' => $number,
            'name' => $name,
            'description' => $description,
            'type1' => $type1,
            'type2' => $type2,
            'url_image' => $url_image
    ]);
    $PokemonManager->create($newPokemon);
    header("Location: Index.php");
}
?>
<section class="container">
    <fieldset class="container">
        <legend>Créer un nouveau Pokemon</legend>
        <form class="form" method="post">
            <label for="number">Numéro : 
                <input type="number" name="number" id="number" placeholder="25" min="1" max="151" required>
            </label>
            <label for="name">Nom :
                <input type="text" name="name" id="name" placeholder="Pikachu" required>
            </label>
            <label for="description">Description :
                <textarea placeholder=" Description du Pokémon" name="description" id="description" rows="6"
                          cols="40"></textarea>
            </label>
          <label for="type1">Type :
                <select name="type1" required>
                    <?php foreach ($types as $type): ?>
                   <option value="<?php echo $type->getId(); ?>"><?= $type->getName();?></option>
                    <?php endforeach ?>
                    <option selected value="">--</option>
                </select>
            </label>
            <label for="type2">Type secondaire :
                <select name="type2">
                    <?php foreach ($types as $type): ?>
                        <option value="<?php echo $type->getId(); ?>"><?= $type->getName();?></option>
                    <?php endforeach ?>
                    <option selected value="">--</option>
                </select>
            </label>
            <label for="url_image">Lien vers l'image :
                <input type="url" name="url_image"
                id="url_image" placeholder="https://example.com" pattern="https://.*"
                       size="300" required />
            </label>  
            <input class="button" type="submit" name="submit" id="submit">
        </form>
    </fieldset>
</section>
</body>
</html>