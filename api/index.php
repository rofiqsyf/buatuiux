<?php
echo "HELLO FROM VERCEL PHP!";
exit;
error_reporting(E_ALL);

/**
 * Entry point for Vercel Serverless Functions
 * Forward requests to Laravel's normal entry point
 */
$envVars = [
    'APP_ENV' => 'production',
    'APP_DEBUG' => 'true',
    'APP_KEY' => 'base64:9FpY0bN8dOa4M2pY0bN8dOa4M2pY0bN8dOa4M2pY0bM=',
    'CACHE_DRIVER' => 'array',
    'LOG_CHANNEL' => 'stderr',
    'SESSION_DRIVER' => 'cookie',
    'VIEW_COMPILED_PATH' => '/tmp'
];
foreach ($envVars as $key => $value) {
    putenv("$key=$value");
    $_ENV[$key] = $value;
    $_SERVER[$key] = $value;
}

require __DIR__ . '/../public/index.php';
