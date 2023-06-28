<?php
namespace Main;
include "DataQuery.php";
include "DataRenderer.php";

use PDO;


class DatabaseConnection
{
    private $pdo;

    public function __construct($host, $username, $password, $dbname, $charset = 'utf8')
    {
        $dsn = "mysql:host={$host};dbname={$dbname};charset={$charset};port=8180";

        try {
            $this->pdo = new PDO($dsn, $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            echo "Database connection failed: " . $e->getMessage();
        }
    }

    public function getConnection()
    {
        return $this->pdo;
    }
}



$database = new DatabaseConnection('localhost', 'root', '', 'wordpress');
$query = new DataQuery($database);
$data = $query->getDataFromTable('wp_posts');



$pdo = $database->getConnection();
