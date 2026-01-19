<?php
// Yksinkertainen wrapper MongoDB:lle
require_once __DIR__ . '/../vendor/autoload.php';

use MongoDB\Client;

class MongoClientService
{
    private Client $client;
    private \MongoDB\Database $db;

    public function __construct(string $uri, string $dbName)
    {
        $this->client = new Client($uri);
        $this->db = $this->client->{$dbName};
    }

    // Palauttaa MongoDB\Collection-instanssin
    public function getCollection(string $name): \MongoDB\Collection
    {
        return $this->db->{$name};
    }
}

