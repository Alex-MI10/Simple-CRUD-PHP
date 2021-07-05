<?php 

class insertData {
    const DB_HOST="localhost";
    const DB_NAME="myproject";
    const DB_USER="root";
    const DB_PASSWORD="";

    private $pdo = null;

//construim conexiunea intre baza de date si sql
    public function __construct(){
        $conStr=sprintF("mysql:host=%s;dbname=%s", 
        self::DB_HOST, self::DB_NAME);
        try{
            $this->pdo = new PDO($conStr, self::DB_USER, self::DB_PASSWORD);

        }catch(PDOException $pe){

            die($pe->getMessage());

        }
        
    }
//facem inserarea in tabelul selectat
    public function insert(){
        $sql = "INSERT INTO author(
            name,
            job,
            created_at
            )
            VALUES(
            'tgedf', 'sdvsdv', NOW())";
             return $this->pdo->exec($sql);

            }

    public function insertBook(){

        $sql = "INSERT INTO book(
            name,
            price, 
            year,
            created_at
            )
            VALUES(
            'tgedf', '150', '2019', NOW())";
             return $this->pdo->exec($sql);
    }        

    public function insertPublisher(){
         $sql = "INSERT INTO publisher(
            name,
            created_at
            )
            VALUES(
            'tgedf', NOW())";

            return $this->pdo->exec($sql);

    }

            
    
}

$obj = new InsertData();
$obj->insert();
$obj->insertBook();
$obj->insertPublisher();