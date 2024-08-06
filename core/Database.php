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
        } catch (\PDOException $e) {
            echo "Connection failed: " . $e->getMessage() . "\n";
        }
    }

    public function add(string $table, array $data)
    {
        $columns = array_keys($data);

        $columnsToString = implode(", ", $columns);
        $valuesToString = implode(", :", $columns);
        $sql = "INSERT INTO $table ($columnsToString) VALUES (:$valuesToString)";

        $stmt = $this->connection->prepare($sql);
        try {
            $stmt->execute($data);
        } catch (\PDOException $e){
            var_dump($stmt);
            echo "Insert failed: " . $e->getMessage() . "\n";
        }
    }

    public function find(string $table, array $conditions = [], array $columns = ['*'])
    {

        $columnsToString = implode(", ", $columns);
        $sql = "SELECT $columnsToString FROM $table";
        if (!empty($conditions)) {
            $conditionsToString = [];
            foreach ($conditions as $column => $value) {
                $conditionsToString[] = "$column = :$column";
            }
            $finalConditions = implode("AND", $conditionsToString);
            $sql .= " WHERE $finalConditions";
        }
        $stmt = $this->connection->prepare($sql);
        try {
            $stmt->execute($conditions);
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "Select failed: " . $e->getMessage() . "\n";
            return false;
        }
    }

    public function findall(string $table, array $conditions = [], array $columns = ['*'])
    {

        $columnsToString = implode(", ", $columns);
        $sql = "SELECT $columnsToString FROM $table";
        if (!empty($conditions)) {
            $conditionsToString = [];
            foreach ($conditions as $column => $value) {
                $conditionsToString[] = "$column = :$column";
            }
            $finalConditions = implode("AND", $conditionsToString);
            $sql .= " WHERE $finalConditions";
        }
        $stmt = $this->connection->prepare($sql);
        try {
            $stmt->execute($conditions);
            return $stmt->fetchall(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "Select failed: " . $e->getMessage() . "\n";
            return false;
        }
    }
}