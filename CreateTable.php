<?php

class CreateTableDemo {

  /*stabilim constantele 
  pentru conexiune*/
    const DB_HOST = 'localhost';
    const DB_NAME = 'myproject';
    const DB_USER = 'root';
    const DB_PASSWORD = '';
    private $pdo = null;


/*construim conexiunea 
intre php si baza de date*/
    public function __construct() {
        $conStr = sprintf("mysql:host=%s;dbname=%s", self::DB_HOST, self::DB_NAME);
        try {
            $this->pdo = new PDO($conStr, self::DB_USER, self::DB_PASSWORD);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    //se termina scriptul
    public function __destruct() {
        $this->pdo = null;
      }

//cream tabelul
      public function createTaskTable() {
        $sql = <<<EOSQL
        CREATE TABLE IF NOT EXISTS proiect(
            id        INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
            ceva         VARCHAR(50) NOT NULL,
            altceva      VARCHAR(50) NOT NULL,
            updated_at   TIMESTAMP NOT NULL DEFAULT NOW() ON UPDATE NOW(),
            created_at   TIMESTAMP NOT NULL
         );
EOSQL;
//returnam executia ca tabelul sa fie creat
     return $this->pdo->exec($sql);

    }
}

//instantiem "$obj" ca un obiect nou pe care il folosim sa executam crearea tabelului
$obj = new CreateTableDemo();
$obj->createTaskTable();


