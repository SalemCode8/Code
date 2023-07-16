<?php

class ServiceContainer
{
    private $bindings = [];
    private $database;

    public function bind($key, $value)
    {
        $this->bindings[$key] = $value;
    }

    public function get($key)
    {
        if ($key === 'database') {
            return $this->getDatabase();
        }

        if (!isset($this->bindings[$key])) {
            throw new Exception("No {$key} is bound in the container.");
        }

        return $this->bindings[$key];
    }

    private function getDatabase()
    {
        if (!$this->database) {
            $host = $this->get('database.host');
            $username = $this->get('database.username');
            $password = $this->get('database.password');
            $database = $this->get('database.database');

            $this->database = new Database($host, $username, $password, $database);
        }

        return $this->database;
    }
}