<?php
require './bootstrap.php';

use App\Utils\Database;

$db = new Database();
$db = $db->getConnection(); 

$statement = <<<EOS
    CREATE TABLE IF NOT EXISTS quotes (
        id INT NOT NULL AUTO_INCREMENT,
        author VARCHAR(50) NOT NULL,
        quote VARCHAR(500) NOT NULL,
        PRIMARY KEY (id)
    ) ENGINE=INNODB;
EOS;

try {

    $db->exec($statement);
    echo "Migrations Ok!\n";
    
} catch (\PDOException $e) {
    exit($e->getMessage());
}