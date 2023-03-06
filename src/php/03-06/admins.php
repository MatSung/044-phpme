<?php

require_once('../../vendor/autoload.php');

try {
	$dsn = 'mysql:host=mariadb;dbname=' . getenv('MYSQL_DATABASE');

    $dbh = new PDO($dsn, getenv('MYSQL_USER'), getenv('MYSQL_PASSWORD'), [
    	PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    	PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
    ]);
    
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
}


// Naudojant PDO ištraukite visus vartotojus su "admin" privilegijomis.

$query = '
    SELECT
        `id`,
        `is_admin`,
        `first_name`,
        `last_name`,
        `birthdate`
    FROM
        `users`
    WHERE
        `is_admin` IS TRUE
    ORDER BY `id`
';

$stmt = $dbh->prepare($query);

$stmt->execute();

$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

// symfony var_dumper
dump($users);