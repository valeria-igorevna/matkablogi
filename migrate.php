<?php
// Migraatio: lukee MySQL:n posts-taulun ja kirjoittaa MongoDB:hen.
// Aja projektin juuresta: php scripts/migrate_mysql_to_mongo.php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/MongoClientService.php';

$config = require __DIR__ . '/../src.php';

// Yhdistä MySQL:iin
$pdo = new PDO(
    $config['mysql']['dsn'],
    $config['mysql']['username'],
    $config['mysql']['password'],
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
);

// Yhdistä MongoDB:hen
$mongo = new MongoClientService($config['mongo']['uri'], $config['mongo']['db']);
$postsColl = $mongo->getCollection('post');

// Muokkaa SQL-kysely oman taulusi mukaiseksi
$stmt = $pdo->query('SELECT * FROM post');

$inserted = 0;
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    // Muunna kentät halutulla tavalla
    $doc = [
        'legacy_id'  => isset($row['id']) ? (int)$row['id'] : null,
        'author_id'  => isset($row['author_id']) ? (int)$row['author_id'] : null,
        'title'      => $row['title'] ?? '',
        'slug'       => $row['slug'] ?? '',
        'body'       => $row['body'] ?? '',
        'tags'       => isset($row['tags']) ? array_filter(array_map('trim', explode(',', $row['tags']))) : [],
        'comments'   => [], // jos kommentit ovat erillisessä taulussa, migroi ne erikseen
        'created_at' => isset($row['created_at']) ? new MongoDB\BSON\UTCDateTime(strtotime($row['created_at']) * 1000) : new MongoDB\BSON\UTCDateTime(),
        'updated_at' => isset($row['updated_at']) ? new MongoDB\BSON\UTCDateTime(strtotime($row['updated_at']) * 1000) : new MongoDB\BSON\UTCDateTime(),
    ];

    $postsColl->insertOne($doc);
    $inserted++;
}

echo "Migroitu dokumenttia: $inserted\n";