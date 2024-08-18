<?php

namespace Core;

use mysqli;
use Exception;


class Database {
    protected $connection;
    protected $stmt;

    public function __construct($config)
    {
        $this->connection = new mysqli($config['db_host'], $config['db_user'], $config['db_pwd'], $config['db_name'], $config['port']);

        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    public function query($sql, $params = [])
    {
        $this->stmt = $this->connection->prepare($sql);

        if ($this->stmt === false) {
            throw new Exception("Failed to prepare statement: " . $this->connection->error);
        }

        // if ($params) {
        //     $types = str_repeat('s', count($params)); // Assuming all parameters are strings
        //     $this->stmt->bind_param($types, ...array_values($params));
        // }

        $this->stmt->execute($params);
        
        // return $this->stmt->get_result();
        return $this;
    }

    public function get()
    {
        return $this->stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function find()
    {
        return $this->stmt->get_result()->fetch_assoc();
    }

    public function findOrFail()
    {
        $result = $this->find();

        if (! $result) {
            abort();
        }

        return $result;
    }

    public function sanitize($value)
    {
        return $this->connection->real_escape_string($value);
    }
}