<?php

// This class is focussed on dealing with queries for one type of data
// That allows for easier re-using and it's rather easy to find all your queries
// This technique is called the repository pattern

use LDAP\Result;

class CardRepository
{
    private DatabaseManager $databaseManager;

    // This class needs a database connection to function
    public function __construct(DatabaseManager $databaseManager)
    {
        $this->databaseManager = $databaseManager;
    }

    public function create(): void
    {
        
        $name = $_POST['pokeName'];
        $type = $_POST['pokeType'];
        $hp = $_POST['hp'];
        $ability = $_POST['ability'];
        $attack1 = $_POST['attack1'];
        $attack2 = $_POST['attack2'];
        $resistance = $_POST['resistance'];
        $weakness = $_POST['weakness'];

        $query = "INSERT INTO pokemon (`pokeName`,`pokeType`,`hp`,`ability`,`attack1`, `attack2`,`weakness`,`resistance`) VALUES ('$name', 
            '$type','$hp','$ability','$attack1','$attack2','$weakness','$resistance')";

        $this->databaseManager->connection->query($query);      
    }

    // Get one
    public function find($card_id): array
    {
        $query = "SELECT pokeName, PokeType, hp, ability, attack1, attack2, weakness, resistance FROM pokemon WHERE id = ('$card_id')"; 
        $result = $this->databaseManager->connection->query($query);  
        $cardInfo = $result->fetch(); 
        require 'show.php';
        return $cardInfo;    
    }
     

    // Get all
    public function get(): PDOStatement
    {
        // TODO: replace dummy data by real one
        $query = "SELECT * FROM `pokemon`"; 
        
        $result = $this->databaseManager->connection->query($query);   
        return $result; 
        // return 
        // [
        //     ['name' => 'Colin'],
        //     ['type' => 'human'],
        //     ['hp' => '1000'],
        //     ['ability' => 'Sleep'],
        //     ['attack1' => 'Snor'],
        //     ['attack2' => 'Fart'],
        //     ['resistance' => 'Bullshit'],
        //     ['weakness' => 'Food'],
        // ];

        // We get the database connection first, so we can apply our queries with it
        // return $this->databaseManager->connection-> (runYourQueryHere)
    }

    

    public function update($card_id)
    {
        $name = $_POST['pokeName'];
        $type = $_POST['pokeType'];
        $hp = $_POST['hp'];
        $ability = $_POST['ability'];
        $attack1 = $_POST['attack1'];
        $attack2 = $_POST['attack2'];
        $resistance = $_POST['resistance'];
        $weakness = $_POST['weakness'];

        if(!empty($name)&&($type)&&($hp)&&($ability)&&($attack1)&&($attack2)&&($resistance)&&($weakness))
        {
            $query = "UPDATE pokemon SET pokeName = ('$name'), pokeType = ('$type'), hp = ('$hp'), ability = ('$ability'), attack1 = ('$attack1'), attack2 = ('$attack2'), resistance = ('$resistance'), weakness = ('$weakness') WHERE id = ('$card_id')";
            $this->databaseManager->connection->query($query); 
        }
        elseif(!empty($name))
        {
            $query = "UPDATE pokemon SET pokeName = ('$name') WHERE id = ('$card_id')";
            $this->databaseManager->connection->query($query); 
        }
        elseif(!empty($type))
        {
            $query = "UPDATE pokemon SET pokeType = ('$type') WHERE id = ('$card_id')";
            $this->databaseManager->connection->query($query); 
        }
        elseif(!empty($hp))
        {
            $query = "UPDATE pokemon SET hp = ('$hp') WHERE id = ('$card_id')";
            $this->databaseManager->connection->query($query); 
        }
        elseif(!empty($ability))
        {
            $query = "UPDATE pokemon SET ability = ('$ability') WHERE id = ('$card_id')";
            $this->databaseManager->connection->query($query); 
        }
        elseif(!empty($attack1))
        {
            $query = "UPDATE pokemon SET attack1 = ('$attack1') WHERE id = ('$card_id')";
            $this->databaseManager->connection->query($query); 
        }
        elseif(!empty($attack2))
        {
            $query = "UPDATE pokemon SET attack2 = ('$attack2') WHERE id = ('$card_id')";
            $this->databaseManager->connection->query($query); 
        }
        elseif(!empty($resistance))
        {
            $query = "UPDATE pokemon SET resistance = ('$resistance') WHERE id = ('$card_id')";
            $this->databaseManager->connection->query($query); 
        }
        elseif(!empty($weakness))
        {
            $query = "UPDATE pokemon SET weakness= ('$weakness') WHERE id = ('$card_id')";
            $this->databaseManager->connection->query($query); 
        }
        
       
    }

    public function delete($card_id)
    {
        $delete = "DELETE FROM `pokemon` WHERE `pokemon`.`id` = '$card_id';";
        $this->databaseManager->connection->query($delete);
    }

}