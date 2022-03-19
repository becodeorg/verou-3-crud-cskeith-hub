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
        echo "Dog";
        $name = $_POST['pokeName'];
        $type = $_POST['pokeType'];
        $hp = $_POST['hp'];
        $ability = $_POST['ability'];
        $attack1 = $_POST['attack1'];
        $attack2 = $_POST['attack2'];
        $resistance = $_POST['resistance'];
        $weakness = $_POST['weakness'];

        // TODO Validate $_post 

        $query = $this->databaseManager->connection->prepare
        (
            "INSERT INTO pokemon (`pokeName`,`pokeType`,`hp`,`ability`,`attack1`, `attack2`,`resistance`,`weakness`) 
             VALUES (:pokeName, :pokeType,:hp,:ability,:attack1,:attack2,:resistance,:weakness)"
        );

        $query->bindParam(':pokeName',$name);
        $query->bindParam(':pokeType',$type);
        $query->bindParam(':hp',$hp);
        $query->bindParam(':ability',$ability);
        $query->bindParam(':attack1',$attack1);
        $query->bindParam(':attack2',$attack2);
        $query->bindParam(':resistance',$resistance);
        $query->bindParam(':weakness',$weakness);

        $query->execute();

        // $query = "INSERT INTO pokemon (`pokeName`,`pokeType`,`hp`,`ability`,`attack1`, `attack2`,`weakness`,`resistance`) VALUES ('$name', 
        //     '$type','$hp','$ability','$attack1','$attack2','$weakness','$resistance')";

        // $this->databaseManager->connection->query($query);      
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

        echo "<pre>";
        print_r($_POST);
        echo "</pre>";

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
            $query = $this->databaseManager->connection->prepare
            (
                "UPDATE pokemon SET pokeName = :pokeName, pokeType = :pokeType, hp = :hp, ability = :ability, attack1 = :attack1, attack2 = :attack2, resistance = :resistance, weakness = :weakness WHERE id = :card_id"
            );

            $query->bindParam(':pokeName',$name);
            $query->bindParam(':pokeType',$type);
            $query->bindParam(':hp',$hp);
            $query->bindParam(':ability',$ability);
            $query->bindParam(':attack1',$attack1);
            $query->bindParam(':attack2',$attack2);
            $query->bindParam(':resistance',$resistance);
            $query->bindParam(':weakness',$weakness);
            $query->bindParam(':card_id', $card_id);
            $query->execute();
        }
        elseif(!empty($name))
        {
            $query = $this->databaseManager->connection->prepare
            (
                "UPDATE pokemon SET pokeName = :pokeName WHERE id = :card_id"
            );
            $query->bindParam(':pokeName',$name);
            $query->bindParam(':card_id', $card_id);
            $query->execute();

        }
        elseif(!empty($type))
        {
            $query = $this->databaseManager->connection->prepare
            (
                "UPDATE pokemon SET pokeType = :pokeType WHERE id = :card_id"
            );
            $query->bindParam(':pokeType',$type);
            $query->bindParam(':card_id', $card_id);
            $query->execute();
        }
        elseif(!empty($hp))
        {
            $query = $this->databaseManager->connection->prepare
            (
                "UPDATE pokemon SET hp = :hp WHERE id = :card_id"
            );
            $query->bindParam(':hp',$hp);
            $query->bindParam(':card_id', $card_id);
            $query->execute();
        }
        elseif(!empty($ability))
        {
            $query = $this->databaseManager->connection->prepare
            (
                "UPDATE pokemon SET ability = :ability WHERE id = :card_id"
            );
            $query->bindParam(':ability',$ability);
            $query->bindParam(':card_id', $card_id);
            $query->execute();
        }
        elseif(!empty($attack1))
        {
            $query = $this->databaseManager->connection->prepare
            (
                "UPDATE pokemon SET attack1 = :attack1 WHERE id = :card_id"
            );
            $query->bindParam(':attack1',$attack1);
            $query->bindParam(':card_id', $card_id);
            $query->execute();
        }
        elseif(!empty($attack2))
        {
            $query = $this->databaseManager->connection->prepare
            (
                "UPDATE pokemon SET attack2 = :attack2 WHERE id = :card_id"
            );
            $query->bindParam(':attack2',$attack2);
            $query->bindParam(':card_id', $card_id);
            $query->execute();
        }
        elseif(!empty($resistance))
        {
            $query = $this->databaseManager->connection->prepare
            (
                "UPDATE pokemon SET resistance = :resistance WHERE id = :card_id"
            );
            $query->bindParam(':resistance',$resistance);
            $query->bindParam(':card_id', $card_id);
            $query->execute();
        }
        elseif(!empty($weakness))
        {
            $query = $this->databaseManager->connection->prepare
            (
                "UPDATE pokemon SET weakness = :weakness WHERE id = :card_id"
            );
            $query->bindParam(':weakness',$weakness);
            $query->bindParam(':card_id', $card_id);
            $query->execute(); 
            
        }
    }

    public function delete($card_id)
    {
        $query = $this->databaseManager->connection->prepare
        (
            "DELETE FROM pokemon WHERE pokemon . id  = :card_id;"
        );
        $query->bindParam(':card_id', $card_id);
        $query->execute();
    }

}