<?php
namespace Main;

class DataQuery
{
    private $db;

    public function __construct(DatabaseConnection $db)
    {
        $this->db = $db;
    }

    public function getDataFromTable($tableName)
    {
        $query = "SELECT * FROM {$tableName}";

        try {
            $statement = $this->db->getConnection()->prepare($query);
            $statement->execute();
            return $statement->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "Query execution failed: " . $e->getMessage();
        }
    }
}

