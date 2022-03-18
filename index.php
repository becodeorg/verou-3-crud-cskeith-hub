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


// Get the current action to execute
// If nothing is specified, it will remain empty (home should be loaded)
$action = $_GET['action'] ?? null;
$card_id = $_GET['card_id'] ?? null;  

// Load the relevant action
// This system will help you to only execute the code you want, instead of all of it (or complex if statements)

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

// echo "<pre>";
// print_r($_GET);
// echo "</pre>";

switch ($action) {
    case 'create':
        require 'create.php';
        create($cardRepository);
        echo "Cow";
        break;
    case 'show':
        find($cardRepository, $card_id);
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
        overview($cardRepository);
        break;
}

function overview($cardRepository)
{
    $cards = $cardRepository->get();
    require 'overview.php';
}

function create($cardRepository)
{
    echo "Chicken";
    if(!empty($_POST['submit'])){ 
        $cardRepository->create();
        // header("location: index.php");
    } 
}

function find($cardRepository,$card_id)
{
    $cardRepository->find($card_id);
}

function update($cardRepository, $card_id)
{
    if(!empty($_POST['submit'])){ 
        $cardRepository->update($card_id);
       header("location: index.php");
    } 
}

function delete($cardRepository, $card_id)
{
    if(empty($_POST['delete'])){ 
        $cardRepository->delete($card_id);
       header("location: index.php");
    } 
}
