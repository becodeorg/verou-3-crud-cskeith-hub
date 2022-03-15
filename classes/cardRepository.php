<?php

// This class is focussed on dealing with queries for one type of data
// That allows for easier re-using and it's rather easy to find all your queries
// This technique is called the repository pattern
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
        
        $name = $_POST['name'];
        $type = $_POST['type'];
        $hp = $_POST['hp'];
        $ability = $_POST['ability'];
        $attack1 = $_POST['attack1'];
        $attack2 = $_POST['attack2'];
        $resistance = $_POST['resistance'];
        $weakness = $_POST['weakness'];

        $query = "INSERT INTO pokemon (`name`,`type`,`hp`,`ability`,`attack1`, `attack2`,`weakness`,`resistance`) VALUES ('$name', 
            '$type','$hp','$ability','$attack1','$attack2','$weakness','$resistance')";

        $this->databaseManager->connection->query($query);      
        echo "Dog";
    }

    // Get one
    public function find(): array
    {

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

    public function update(): void
    {

    }

    public function delete(): void
    {

    }

}