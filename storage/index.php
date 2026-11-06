<?php
/**
 * Direct web access protection trap.
 */
declare(strict_types=1);

http_response_code(403);
header('Content-Type: text/plain; charset=UTF-8');
echo "403 Forbidden: Direct access to storage directory is strictly prohibited.\n";
exit;

