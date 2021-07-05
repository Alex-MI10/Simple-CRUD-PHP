<?php


class UpdateData{

    const DB_HOST = 'localhost';
    const DB_NAME = 'myproject';
    const DB_USER = 'root';
    const DB_PASSWORD = '';

   
    private $pdo = null;

  
    public function __construct() {
        
        $connStr = sprintf("mysql:host=%s;dbname=%s", self::DB_HOST, self::DB_NAME);
        try {
            $this->pdo = new PDO($connStr, self::DB_USER, self::DB_PASSWORD);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

 
    public function updateAuthor($id,$name,$job) {
        $sql=array(
            ':id' => $id,
            ':name' => $name,
            ':job' => $job
        );
       

        $sql = 'UPDATE author
                    SET name    = :name,
                    job = :job
                  WHERE id = :id';

        $q = $this->pdo->prepare($sql);

        return $q->execute(array(':name'=>$name,':job'=>$job, ':id'=>$id));
    }

    public function updateBook($id, $name, $price, $year){
        $sql=array(
            ':id'=>$id,
            ':name'=>$name,
            ':price'=>$price,
            ':year'=>$year
        );

        $sql = 'UPDATE book
        SET name = :name,
        price=:price,
        year=:year
        WHERE id=:id';

        $q = $this->pdo->prepare($sql);

        return $q->execute(array(':name'=>$name, ':price'=>$price, ':year'=>$year, ':id'=>$id));
    }

    public function updatePublisher($id, $name){
        $sql = array(
            ':id'=>$id,
            ':name'=>$name
        );

        $sql = 'UPDATE publisher
        SET name = :name,
        id=:id
        WHERE id=:id';

        $q = $this->pdo->prepare($sql);

        return $q->execute(array(':name'=>$name, ':id'=>$id));
    }

  

  
    public function __destruct() {
  
        $this->pdo = null;
    }

}

$obj = new UpdateData();


if ($obj->updateAuthor(19, 'alexandru', 
                    'IT-istr') !== false)
    echo 'The task has been updated successfully';
else
    echo 'Error';

    echo "<br>";

if ($obj->updateBook(17, 'alexandru',
                    '21', '1998') !== false)
    echo 'The task has been updated successfully';

else 
    
    echo 'Error';

    echo "<br>";


if ($obj->updatePublisher(17, 'alexandru') !== false)
    echo 'The task has been updated successfully';
else
    echo 'Error';

    