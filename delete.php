<?php

class DeleteData{
    const DB_HOST = 'localhost';
    const DB_NAME = 'myproject';
    const DB_USER = 'root';
    const DB_PASSWORD = '';


    private $pdo = null;


    public function __construct(){
        $conStr = sprintf("mysql:host=%s;dbname=%s", self::DB_HOST, self::DB_NAME);

        try{
            $this->pdo= new PDO($conStr, self::DB_USER, 
            self::DB_PASSWORD);

        } catch(PDOException $e){
            die($e->getMessage());

        }
    }

    public function deleteAuthor($id){
        $sql = 'DELETE FROM author
        WHERE id=:id';

        $q = $this->pdo->prepare($sql);

        return $q->execute([':id'=>$id]);

    }

    public function deleteBook($id){
        $sql = 'DELETE FROM book
        WHERE id=:id';

        $q=$this->pdo->prepare($sql);

        return $q->execute([':id'=>$id]);
    }

    public function deletePublisher($id){
        $sql='DELETE FROM publisher
        WHERE id=:id';

        $q=$this->pdo->prepare($sql);

        return $q->execute([':id'=>$id]);
    }

    public function __destruct(){
        $this->pdo=null;

    }
}

$obj = new DeleteData();
$obj->deleteAuthor(17);
$obj->deleteBook(15);
$obj->deletePublisher(15);