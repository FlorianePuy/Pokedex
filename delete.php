<?php
require 'PokemonsManager.php';
$manager = new PokemonsManager();
$manager->delete($_GET['id']);
header("Location: Index.php");