<?php

require_once('../../vendor/autoload.php');

function fetchGender($gender, $dbh): array
{
    $query = '
    SELECT
        *
    FROM
        `users`
    WHERE
        `gender` = :gender
    ORDER BY `id`
    ';


    $stmt = $dbh->prepare($query);

    $stmt->bindValue(':gender', $gender, PDO::PARAM_STR);

    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


try {
    $dsn = 'mysql:host=mariadb;dbname=' . getenv('MYSQL_DATABASE');

    $dbh = new PDO($dsn, getenv('MYSQL_USER'), getenv('MYSQL_PASSWORD'), [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
    ]);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
}


// Naudojant PDO parodykite sugrupuotus pagal lytį vartotojus.


// symfony var_dumper
dump(fetchGender('male', $dbh));
dump(fetchGender('female', $dbh));
