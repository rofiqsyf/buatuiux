<?php

/**
 * Entry point for Vercel Serverless Functions
 * Forward requests to Laravel's normal entry point
 */
putenv('APP_ENV=production');
putenv('APP_DEBUG=true');
putenv('APP_KEY=base64:9FpY0bN8dOa4M2pY0bN8dOa4M2pY0bN8dOa4M2pY0bM=');
putenv('CACHE_DRIVER=array');
putenv('LOG_CHANNEL=stderr');
putenv('SESSION_DRIVER=cookie');
putenv('VIEW_COMPILED_PATH=/tmp');

require __DIR__ . '/../public/index.php';
