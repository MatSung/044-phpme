<?php

try {
	$dsn = 'mysql:host=mariadb;dbname=' . getenv('MYSQL_DATABASE');

    $dbh = new PDO($dsn, getenv('MYSQL_USER'), getenv('MYSQL_PASSWORD'), [
    	PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    	PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
    ]);
    
    // $dbh->query(file_get_contents('sql/create.sql'));
    // $dbh->query(file_get_contents('sql/insert.sql')); 
        
    // printf('Success PDO: %s', $dbh->getAttribute(PDO::ATTR_CONNECTION_STATUS));
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
}

// echo "\n";

// Naudojant PDO ištraukite 13 naujausiu pilnamečių vartotojų.

$query = '
    SELECT
        `id`,
        `first_name`,
        `last_name`,
        `birthdate`
    FROM
        `users`
    WHERE
        `birthdate` < DATE_SUB(CURDATE(), INTERVAL 18 YEAR)
    ORDER BY `id` DESC
    LIMIT 13
';

$stmt = $dbh->prepare($query);

$stmt->execute();

$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

var_export($users);