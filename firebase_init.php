<?php
require __DIR__ . '/vendor/autoload.php';

use Kreait\Firebase\Factory;


$firebase = (new Factory)
    ->withServiceAccount('/Applications/XAMPP/xamppfiles/htdocs/nova_ed_database/novaed-user-db-firebase-adminsdk-fbsvc-b119e6b0e5.json')
    ->withDatabaseUri('https://novaed-user-db-default-rtdb.firebaseio.com/');

// If using Realtime Database:
$database = $firebase->createDatabase();

// If using Firestore:
// $firestore = $firebase->createFirestore();
// $db = $firestore->database();
