<?php

require_once "dbconfig.php";


try{
    $pdo = new PDO("mysql:host=$host;dbname=$dbname",
    $username, $password);

    $sql = 'SELECT name,
    job
    from author
    ORDER BY job';

    $q = $pdo->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
   

} catch (PDOException $e){
    die("Could not connect to the database $dbname:".$e->getMessage());
    
}  

?>
<!DOCTYPE html>

<html>
    <head>
        <title>DATABASE</title>
        <link href = "css/boostrap.min.css" rel="stylesheet">
        <link href = "css/style.css" rel="stylesheet">
    </head>
    <body>
  
    
        <div id = "container">
            <h1>Authors</h1>
            <table class = "table table-bordered table-condensed">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Job</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row=$q->fetch()):?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['name'])?></td>
                            <td><?php echo htmlspecialchars($row['job'])?></td>

                        </tr>
                        <?php endwhile;?>
                        
                        
                        <hr>
                </tbody>

            </table>
        </div>
    </body>
</html>
<hr>


<?php
try{
    $pdo = new PDO("mysql:host=$host;dbname=$dbname",
    $username, $password);

    $sql = 'SELECT name,
    price, year
    from book
    ORDER BY year';

    $q = $pdo->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
   

} catch (PDOException $e){
    die("Could not connect to the database $dbname:".$e->getMessage());
    
}  

?>
<!DOCTYPE html>

<html>
    <head>
        <title>DATABASE</title>
        <link href = "css/boostrap.min.css" rel="stylesheet">
        <link href = "css/style.css" rel="stylesheet">
    </head>
    <body>
  
    
        <div id = "container">
            <h1>Book</h1>
            <table class = "table table-bordered table-condensed">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Year</th>

                    </tr>
                </thead>
                <tbody>
                    <?php while($row=$q->fetch()):?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['name'])?></td>
                            <td><?php echo htmlspecialchars($row['price'])?></td>
                            <td><?php echo htmlspecialchars($row['year'])?></td>

                        </tr>
                        <?php endwhile;?>
                        
                        
                        <hr>
                </tbody>

            </table>
        </div>
    </body>
</html>
<hr>

<?php
try{
    $pdo = new PDO("mysql:host=$host;dbname=$dbname",
    $username, $password);

    $sql = 'SELECT name,
    id
    
    from publisher
    ORDER BY name';

    $q = $pdo->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
   

} catch (PDOException $e){
    die("Could not connect to the database $dbname:".$e->getMessage());
    
}  

?>
<!DOCTYPE html>

<html>
    <head>
        <title>DATABASE</title>
        <link href = "css/boostrap.min.css" rel="stylesheet">
        <link href = "css/style.css" rel="stylesheet">
    </head>
    <body>
  
    
        <div id = "container">
            <h1>Publisher</h1>
            <table class = "table table-bordered table-condensed">
                <thead>
                    <tr>
                        <th>Name</th>
                       
                    </tr>
                </thead>
                <tbody>
                    <?php while($row=$q->fetch()):?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['name'])?></td>
                           

                        </tr>
                        <?php endwhile;?>
                        
                        
                        <hr>
                </tbody>

            </table>
        </div>
    </body>
</html>
<hr>




