<?php
$envVars = [
    'APP_ENV' => 'production',
    'APP_DEBUG' => 'true',
    'APP_KEY' => 'base64:9FpY0bN8dOa4M2pY0bN8dOa4M2pY0bN8dOa4M2pY0bM=',
    'CACHE_DRIVER' => 'array',
    'LOG_CHANNEL' => 'errorlog',
    'SESSION_DRIVER' => 'cookie',
    'VIEW_COMPILED_PATH' => '/tmp',
    'APP_CONFIG_CACHE' => '/tmp/config.php',
    'APP_SERVICES_CACHE' => '/tmp/services.php',
    'APP_PACKAGES_CACHE' => '/tmp/packages.php',
    'APP_ROUTES_CACHE' => '/tmp/routes.php',
    'APP_EVENTS_CACHE' => '/tmp/events.php',
    'APP_MAINTENANCE_DRIVER' => 'file',
];
foreach ($envVars as $key => $value) {
    putenv("$key=$value");
    $_ENV[$key] = $value;
    $_SERVER[$key] = $value;
}

try {
    require __DIR__ . '/../public/index.php';
} catch (\Throwable $e) {
    echo "<h1>FATAL EXCEPTION</h1>";
    echo "<pre>";
    echo "Error: " . $e->getMessage() . "\n\n";
    echo "File: " . $e->getFile() . " on line " . $e->getLine() . "\n\n";
    echo "Trace:\n" . $e->getTraceAsString();
    echo "</pre>";
}
