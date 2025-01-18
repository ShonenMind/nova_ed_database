<?php
declare(strict_types=1);

error_reporting(E_ALL);
ini_set('display_errors', '1');

$autoloader = __DIR__ . '/vendor/autoload.php';
if (!file_exists($autoloader)) {
    die("Autoloader missing at $autoloader");
}
require_once $autoloader;

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

echo "Autoloader included<br>";

if (class_exists(Factory::class)) {
    echo "Factory class found<br>";
} else {
    echo "Factory class NOT found<br>";
}

if (class_exists(ServiceAccount::class)) {
    echo "ServiceAccount class found<br>";
    // Test code:
    // $serviceAccount = ServiceAccount::fromJsonFile(__DIR__ . '/serviceAccountKey.json');
} else {
    echo "ServiceAccount class NOT found<br>";
}
