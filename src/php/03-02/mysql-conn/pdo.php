<?php

try {
	$dsn = 'mysql:host=mariadb;dbname=' . getenv('MYSQL_DATABASE');

    $dbh = new PDO($dsn, getenv('MYSQL_USER'), getenv('MYSQL_PASSWORD'), [
    	PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    	PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
    ]);
    
    // $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // $dbh->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8');
    
    printf('Success PDO: %s', $dbh->getAttribute(PDO::ATTR_CONNECTION_STATUS));
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
}
?>