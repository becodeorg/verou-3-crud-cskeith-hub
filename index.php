<?php

// Require the correct variable type to be used (no auto-converting)
declare (strict_types = 1);

// Show errors so we get helpful information
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// Load you classes
require_once 'config.php';
require_once 'classes/DatabaseManager.php';
require_once 'classes/CardRepository.php';

$databaseManager = new DatabaseManager($config['host'], $config['user'], $config['password'], $config['dbname']);
$databaseManager->connect();

// This example is about a Pokémon card collection
// Update the naming if you'd like to work with another collection
$cardRepository = new CardRepository($databaseManager);
$cards = $cardRepository->get();

// Get the current action to execute
// If nothing is specified, it will remain empty (home should be loaded)
$action = $_GET['action'] ?? null;
$card_id = $_GET['card_id'] ?? null;  




// Load the relevant action
// This system will help you to only execute the code you want, instead of all of it (or complex if statements)

echo "<pre>";
print_r($_POST);
echo "</pre>";

echo "<pre>";
print_r($_GET);
echo "</pre>";

switch ($action) {
    case 'create':
        require 'create.php';
        create($cardRepository);
        break;
    case 'edit':
        require 'edit.php';
        update($cardRepository, $card_id);
        break;
    case 'delete':
        require 'delete.php';
        delete($cardRepository, $card_id);
        break;  
    default:
        require 'overview.php';
        break;
}

function overview()
{
    // Load your view
    // Tip: you can load this dynamically and based on a variable, if you want to load another view
    require 'overview.php';
}

function create($cardRepository)
{
    // TODO: provide the create logic
    
    if(isset($_POST['submit'])){ // in Use of submit
        $cardRepository->create();
        header("location: index.php");
    } 
}

function update($cardRepository, $card_id)
{
    
    // TODO: provide the update logic
    if(isset($_POST['submit'])){ // in Use of submit
        $cardRepository->update($card_id);
       header("location: index.php");
    } 
}

function delete($cardRepository, $card_id)
{
    
    // TODO: provide the update logic
    if(empty($_POST['delete'])){ // in Use of submit
        $cardRepository->delete($card_id);
       header("location: index.php");
    } 
}
