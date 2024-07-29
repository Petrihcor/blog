<?php

namespace App;



class Database
{

    private \PDO $connection;
    public function __construct(

    )
    {
        $config = require __DIR__ . '/../config/db.php';

        $dsn = 'mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'] . ';charset=utf8';
        $username = $config['username'];
        $password = $config['password'];

        try {
            $this->connection = new \PDO($dsn, $username, $password);
            $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            echo "Connected to the database successfully.\n";
        } catch (\PDOException $e) {
            echo "Connection failed: " . $e->getMessage() . "\n";
        }
    }
}