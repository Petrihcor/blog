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

    public function leftJoin($t1, $t2, array $columns1, array $columns2, $column1, $column2, array $conditions)
    {

        $c1 = "$t1." . implode(", $t1.", $columns1);

        $c2 = "$t2." . implode(", $t2.", $columns2);

        $sql = "SELECT $c1, $c2 FROM $t1
                LEFT JOIN $t2 ON $t1.$column1 = $t2.$column2 ";

        if (!empty($conditions)) {
            $conditionsString = [];
            foreach ($conditions as $key => $condition) {

                if (is_array($condition)) {

                    $subCondition = [];
                    foreach ($condition as $value) {

                        if ($value) {
                            $subCondition[] = "$t1.$key = $value ";
                        } else {
                            $subCondition[] = "$t1.$key IS NULL ";
                        }
                    }

                    $conditionsString[] = implode(" OR ", $subCondition);
                } elseif ($condition == null) {
                    $conditionsString[] = "$t1.$key IS NULL ";
                } else {
                    $conditionsString[] = "$t1.$key = $condition ";
                }
            }

            $sql .= "WHERE " .implode(" AND ", $conditionsString);
        }

        $stmt = $this->connection->prepare($sql);

        try {
            $stmt->execute();
        } catch (\PDOException $exception) {
            echo $exception->getMessage();
        }
        return $stmt->fetchAll();
    }
}