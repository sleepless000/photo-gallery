<?php

class QueryBuilder
{
    protected $conn;
    protected $records=[];
    protected $table;

    public function __construct(mysqli $conn, string $table)
    {
        $this->conn = $conn;
        $this->table = $table;
    }

    public function selectAll(): array
    {
        $result = $this->conn->query("SELECT * FROM {$this->table} ORDER BY id DESC");
        $this->conn->close();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function find(string $id): ?array
    {
        $id = $this->escape($id);
        $result = $this->conn->query("SELECT * FROM {$this->table} WHERE id = {$id};");
        $this->conn->close();
        return $result->fetch_assoc();
    }

    public function insert($path, $title, $description): bool
    {
        $path = $this->escape($path);
        $title = trim($this->escape($title));
        $description = trim($this->escape($description));
        return $this->conn->query(
            "INSERT INTO {$this->table} (path, title, description)
                    VALUES ('{$path}', '{$title}', '{$description}');"
            );
    }

    protected function escape($string): string
    {
        return mysqli_real_escape_string($this->conn, $string);
    }
}
