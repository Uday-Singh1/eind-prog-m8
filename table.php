<?php
require 'DatabaseConnection.php';
require __DIR__ . '/Twig/vendor/autoload.php';

if (empty($tables)) {
    $query = "SHOW TABLES";
    $result = $pdo->query($query);

    $tables = [];
    if ($result) {
        while ($row = $result->fetch(PDO::FETCH_NUM)) {
            $tables[] = $row[0];
        }
    } else {
        echo "Er is een fout opgetreden bij het ophalen van de tabellen.";
    }
}

$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/templates');
$twig = new \Twig\Environment($loader);

echo $twig->render('base.twig', ['tables' => $tables]);

$pdo = null;
